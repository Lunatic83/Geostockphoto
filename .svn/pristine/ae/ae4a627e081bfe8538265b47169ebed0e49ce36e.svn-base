<?php

class PhotoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/operative';
	public $pageName="";

	public $onloadFunctions;

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
			'actions'=>array('autoCompleteKeyword', 'topten', 'index', 'showInfoPhoto',  'updateMap', 'updateMapOpt', 'updateMapSemp',
				'cronJobApprovePhoto', 'ajaxViewIncrementCount', 'reservePhotoToEditors', 'cronJobFtpFiles', 'getPosition',
				'toptenFast', 'crop', 'view', 'cronJobFtpEditorFiles', 'cronJobFtpEditorFiles2', 'cronJobPanoramio',
				'ondemand', 'updateMapRequest', 'showInfoPhotoRequest', 'license', 'test', 'list', 'listFast', 'updateMapNew',
				'showInfoPhotoNew',
				//API
				'getSearch', 'getInfo', 'getConfCategory', 'getConfSize', 'downloadAPI'
				),
			'users'=>array('*'),
				),
				array('allow', // allow authenticated
			'actions'=>array('edit', 'deleteSinglePhoto', 'deleteMultiplePhoto', 'submit',
				'ajaxSave', 'submitted',  'upload', 'xUpload', 'status', 'reviewed', 'vote',
				'cronJobSubmit', 'editSelectionJson', 'ftpRequest', 'reportAbuse', 'reported', 'pendingSubmit',
				'reportEditor', 'reportAuthor', 'purchased', 'download'),
			'users'=>array('@'),
				),
				array('allow', // allow admin user
			'actions'=>array('admin', 'dataDev', 'collectAllPhotos', 'collectDistributedPhotos', 
				 'breakingnews', 'phpInfo', 'listPanoramioUsers', 'cronJobBonusUpdate',
				 'TempUpdateRate', 'updateShootingDate', 'panoramio', 'panoramioRequested',
				 'countPanoramioUserPhotos', 'msgPanoramio', 'checkreviews','acceptReportAbuse','rejectReportAbuse'
				 ),
		    'expression'=>'$user->isAdministrator()',
				 ),
				 array('deny',  // deny all users
			'users'=>array('*'),
			),
		);
	}
	
	public function actionTest($user="", $location=""){
		$this->layout='//layouts/osama';
		
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/osama/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/osama/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
	
		$idPhotoType=1;
		$criteria=new CDbCriteria;
		$criteria->select='t.idProduct, t.lat, t.lng';
		$criteria->condition='idPhotoType=:idPhotoType';
		$criteria->params=array(':idPhotoType'=>$idPhotoType);
		if($user!='')
			$criteria->with['product']['with']['idUser0']['condition']='username=\''.$user.'\'';
		$criteria->order='t.rate DESC, approvedDate DESC';
		$criteria->limit=1;
		$data=Photo::model()->find($criteria);

		if(isset($data->idProduct) & isset($data->lat) & isset($data->lng)){
			$idProduct=$data->idProduct;
			$lat = $data->lat;
			$lng = $data->lng;
		}else{
			$idProduct=null;
			$lat = 1000;
			$lng = 1000;
		}
		Yii::app()->controller->onloadFunctions="initializeMapIndexDistr($lat, $lng, '$user', '$location', $idPhotoType)";
		
		$this->render('index_test', array('idProduct'=>$idProduct));
	}
	
	public function actionCheckreviews(){
		$criteria=new CDbCriteria;
		$criteria->select='idProduct';
		$criteria->having='count(idProduct)>1';
		$criteria->group='idProduct';
		$reviews=Reviews::model()->findAll($criteria);
		
		$cntPhotoWrongAcp=0;
		$cntPhotoWrongRjc=0;
		$cntPhotoEvaluated=0;
		$tmpDiff=0;
		$cntDiff=0;
		
		for($i=0; $i<count($reviews); $i++){
			$criteria=new CDbCriteria;
			$criteria->condition='idProduct='.$reviews[$i]->idProduct;
			$modelReview=Reviews::model()->findAll($criteria);
			$rateUsers=0;
			$superVote=-6;
			for($k=0; $k<count($modelReview); $k++){
				if($modelReview[$k]->idUser==1)
					$superVote=$modelReview[$k]->rate;
				else
					$rateUsers=$rateUsers+$modelReview[$k]->rate;
			}
			if($superVote==-6)
				continue;
			$cntPhotoEvaluated++;
			$averageRateUsers=ceil($rateUsers/(count($modelReview)-1));
			if($superVote>0 && $averageRateUsers<=0)
				$cntPhotoWrongAcp++;
			elseif($superVote<0 && $averageRateUsers>0)
				$cntPhotoWrongRjc++;
			if($superVote>0){
				$tmpDiff=$tmpDiff+abs($superVote-$averageRateUsers);
				$cntDiff++;
			}
		}
		$tmpDiff=$tmpDiff/$cntDiff;
		echo "Numero di foto valutate anche da altri utenti: ".$cntPhotoEvaluated.'<br>';
		echo "Numero di foto rifiutate che sarebbero state approvate dagli utenti: ".$cntPhotoWrongRjc.'<br>';
		echo "Numero di foto accettate che sarebbero state rifiutate dagli utenti: ".$cntPhotoWrongAcp.'<br>';
		echo "Media della differenza tra il voto dell'amministratore e quello degli utenti: ".$tmpDiff.'<br>';
	}

	public function actionPhpInfo(){
		phpinfo();
	}

	public function actionCronJobBonusUpdate(){
		$timeWindow=ConfParameters::model()->findByPk("TimeWindowBonusUpdate");
		$nextSBUpdate = time() + floatval($timeWindow->value); // 30 days before
		$nextSBUpdate = Yii::app()->dateFormatter->format('yyyy/MM/dd hh/mm/ss', $nextSBUpdate);
		$actualTime = Yii::app()->dateFormatter->format('yyyy/MM/dd hh/mm/ss', time());

		$criteria=new CDbCriteria;
		$criteria->condition='nextBonusUpdate_timestamp<:nextBonusUpdate_timestamp';
		$criteria->params=array(':nextBonusUpdate_timestamp'=>$actualTime);
		$users=User::model()->findAll($criteria);
		echo count($users)."<br>";

		$transaction = Yii::app()->db->beginTransaction();
		try{
			for($i=0; $i<count($users); $i++){
				$criteria->condition='idUser=:idUser AND updatedSB=:updatedSB';
				$criteria->params=array(':idUser'=>$users[$i]->idUser, ':updatedSB'=>'0');
				$reviews=Reviews::model()->findAll($criteria);
				$countReviews=count($reviews);
				$newBonus = max($countReviews*$users[$i]->idUserProfile0->multiplication_factor_sb, 10);
				for($k=0; $k<$countReviews; $k++){
					$reviews[$k]->updatedSB='1';
					if(!$reviews[$k]->save())
					throw new CHttpException(404,'CRON JOB Bonus Update: something went wrong while updating the reviews of user #'.$users[$i]->idUser);
				}
				$users[$i]->submitBonus = $newBonus;
				$users[$i]->nextBonusUpdate_timestamp = $nextSBUpdate;
				if(!$users[$i]->save())
				throw new CHttpException(404,'CRON JOB Bonus Update: something went wrong while saving the information of user #'.$users[$i]->idUser);
				echo $users[$i]->idUser." ".$users[$i]->submitBonus."<br>";
			}
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
	}

	public function actionCronJobApprovePhoto(){
		//$this->gspLog("info", "BEGIN transaction");
		$transaction = Yii::app()->db->beginTransaction();
		try{
			//$this->gspLog("info", "start try");
			$criteria=new CDbCriteria;
			$criteria->condition='reviewedPhoto=0';
			$criteria->select='idProduct';
			$criteria->group='idProduct';
			//$this->gspLog("info", "before findAll");
			$data=Reviews::model()->findAll($criteria);
			//$this->gspLog("info", "after findAll");
			$accepted=0;
			$rejected=0;
			$still_wr=0;
			$photographerUpdate=array();
			$photoReviewed=array();
		
			for($i=0; $i<count($data); $i++){
				//$this->gspLog("info", "START CICLO idProduct=".$data[$i]->idProduct);
				//if(($accepted+$rejected)>50)
					//break;
				$modelProductPp=$this->loadModel($data[$i]->idProduct);
				if($modelProductPp->idProductStatus==2){
					$criteria1Photo=new CDbCriteria;
					$criteria1Photo->condition='idProduct=:idProduct';
					$criteria1Photo->params=array(':idProduct'=>$data[$i]->idProduct);
					$data1Photo=Reviews::model()->findAll($criteria1Photo);
					$nvotes=count($data1Photo);
						
					$rate=0;
					$tot_weight=0;
					for($j=0; $j<$nvotes; $j++){
						if(isset($modelProductPp->photoPrePost->idGroup)){
							$tot_weight=1;
							$idReviewer=$data1Photo[$j]->idUser;
						}else{
							$tot_weight = $tot_weight + $data1Photo[$j]->idUser0->voteWeight;
							$idReviewer=null;
						}
						$rate = $rate + ($data1Photo[$j]->rate*$data1Photo[$j]->idUser0->voteWeight);
					}
					$averageRate = ceil($rate/$tot_weight); //round(3.5) diventa 4, con ceiling anche 3.1 diventa 4

					//throw new CHttpException(404,'CRON JOB: start');
					if($averageRate>0 && $tot_weight>=1){
						for($j=0; $j<$nvotes; $j++){
							$data1Photo[$j]->reviewedPhoto = 1;
							if(!$data1Photo[$j]->save())
								throw new CHttpException(404,'CRON JOB approve photo: something went wrong while saving the review number '.$j.' of the photo #'.$data[$i]->idProduct);
						}
						//throw new CHttpException(404,'CRON JOB: approved');
						Yii::app()->controller->approvePhoto($data[$i]->idProduct, $nvotes, $averageRate, 3, $idReviewer);
						$linkPhoto="<a href='".$this->createAbsoluteUrl('photo/view').'/'.$data[$i]->idProduct."'>".$data[$i]->idProduct."</a>";
						//echo "APPROVED: ".$linkPhoto." - VOTE: ".$averageRate."<br>\n ";
						$photographerUpdate[$accepted]=$data[$i]->idProduct0->idUser;
							
						$photoReviewed[$data[$i]->idProduct0->idUser]['accepted'][]=array('id'=>$modelProductPp->idProduct);
						$accepted++;
					}else if($averageRate<=0 && $tot_weight>=1){
						for($j=0; $j<$nvotes; $j++){
							$data1Photo[$j]->reviewedPhoto = 1;
							if(!$data1Photo[$j]->save())
								throw new CHttpException(404,'CRON JOB approve photo: something went wrong while saving the review number '.$j.' of the photo #'.$data[$i]->idProduct);
						}
						//throw new CHttpException(404,'CRON JOB: rejected');
						Yii::app()->controller->approvePhoto($data[$i]->idProduct, $nvotes, $averageRate, 4, null);
						//echo "REJECTED: ".$modelProductPp->idProduct."<br>\n ";
						$photoReviewed[$data[$i]->idProduct0->idUser]['rejected'][]=array('id'=>$modelProductPp->idProduct);
						$rejected++;
					}
				}
				//$this->gspLog("info", "END CICLO idProduct=".$data[$i]->idProduct);
			}
			//$this->gspLog("info", " END CICLO FOR");
			if(($accepted+$rejected)>0)
				echo "<br>TOTAL: ACCEPTED ".$accepted." - REJECTED ".$rejected;//." - STILL WR: ".$still_wr;
			if(count($photoReviewed)>0){
				Yii::app()->controller->sendEmailApprovedPhotos($photoReviewed);
			}
			//$this->gspLog("info", "END invio emails");
			Yii::app()->controller->photographerUpdate(array_values($photographerUpdate));
			//$this->gspLog("info", "END aggiornamento fotografi");
			$transaction->commit();
			//$transaction->rollBack();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
	}

	private function checkUnlockProfile($modelUser, $newPhotos){
		$nPhotos = $modelUser->nPhotos;
		$unlock="";
		if($nPhotos>=1000){
			if($nPhotos-$newPhotos<1000)
				$unlock="Personal Contacts";
		}elseif($nPhotos>=100){
			if($nPhotos-$newPhotos<100)
				$unlock="Photographer Info";
		}elseif($nPhotos>=10){
			if($nPhotos-$newPhotos<10)
				$unlock="GeoStockPhoto Statistics";
		}
		
		if($unlock!=""){
			$message = new YiiMailMessage;
			$message->view = 'unlockProfile';
			$message->setBody(array('modelUser'=>$modelUser, 'unlock'=>$unlock), 'text/html');
			$message->addTo($modelUser->email);
			$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
			$message->setSubject('New info available on your profile page');
			Yii::app()->mail->send($message);
		}
	}

	private function sendEmailApprovedPhotos($photoReviewed){
		foreach($photoReviewed as $user=>$value){
			$modelUser=User::model()->findByPk($user);
			//$this->gspLog("info", "Sending email to ".$modelUser->username);
			$msg = "Hi ".$modelUser->username;
			if(isset($value['accepted'])){
				$cnt=count($value['accepted']);
				if($cnt>0){
					Yii::app()->controller->checkUnlockProfile($modelUser, $cnt);
					$msg = $msg . "<br><br>Congratulations, ".$cnt." of your photos have been accepted:<br>";
					$cntMax=min(3, $cnt);
					for($i=0; $i<$cntMax; $i++){
						$modelProductPp=$this->loadModel($value['accepted'][$i]['id']);
						$linkPhoto="<a href='".$this->createAbsoluteUrl('photo/view').'/'.$value['accepted'][$i]['id'].'/'.$modelProductPp->urlTitle."'>".$value['accepted'][$i]['id']."</a>";
						$msg = $msg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[".$linkPhoto."] ".$modelProductPp->title."<br>";
					}
					if($cntMax<$cnt)
						$msg = $msg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...<br>";
					$msg = $msg . "You can see them in our <a href='".$this->createAbsoluteUrl('photo/index')."'>Homepage</a>
			    		and in your <a href='".$this->createAbsoluteUrl('portfolio/'.$modelUser->username)."'>Portfolio</a>";
				}
			}
			if(isset($value['rejected'])){
				$cnt=count($value['rejected']);
				if($cnt>0){
					$msg = $msg . "<br><br>Sorry, ".$cnt." of your photos have been rejected:<br>";
					$cntMax=min(3, $cnt);
					for($i=0; $i<$cntMax; $i++){
						$modelProductPp=$this->loadModel($value['rejected'][$i]['id']);
						$msg = $msg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[".$value['rejected'][$i]['id']."] ".$modelProductPp->title."<br>";
					}
					if($cntMax<$cnt)
						$msg = $msg . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...<br>";
					$msg = $msg . "You can see why they have been rejected in the <a href='".$this->createAbsoluteUrl('photo/status/state/rejected')."'>Status Page</a> of your photos.";
				}
			}
			$msg = $msg . "<br><br>Keep uploading.<br>GeoStockPhoto Staff<br><br>";

			$message = new YiiMailMessage;
			$message->view = 'approvedPhotos';
			$message->setBody(array('msg'=>$msg), 'text/html');
			$message->addTo($modelUser->email);
			$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
			$message->setSubject('Your photos have been evaluated');
			Yii::app()->mail->send($message);
			//$this->gspLog("info", "Email sent to ".$modelUser->username);
		}
	}

	private function photographerUpdate($photographerUpdate){
		for($i=0; $i<count($photographerUpdate); $i++){
			$modelUser=User::model()->findByPk($photographerUpdate[$i]);
			$numPhotos=count($modelUser->products);
			$totRate=0;
			$nPhoto=0;
			$idUserProfile=$modelUser->idUserProfile;
				
			// Verifico il tipo di utente e ne setto i parametri per l'update
			if($idUserProfile==2){ //USER
				$minRate=intval(ConfParameters::model()->findByPk("RatePhotoNewbiePhotographer")->value);
				$minNumber=intval(ConfParameters::model()->findByPk("NumberPhotoNewbiePhotographer")->value);
				$newProfile=3;
			}else if($idUserProfile==3){ //NEWBIE
				$minRate=intval(ConfParameters::model()->findByPk("RatePhotoProfessionalPhotographer")->value);
				$minNumber=intval(ConfParameters::model()->findByPk("NumberPhotoProfessionalPhotographer")->value);
				$newProfile=4;
			}else if($idUserProfile==4){ //PROS
				$minRate=intval(ConfParameters::model()->findByPk("RatePhotoPowerPhotographer")->value);
				$minNumber=intval(ConfParameters::model()->findByPk("NumberPhotoPowerPhotographer")->value);
				$newProfile=5;
			}else if($idUserProfile!=5 && $idUserProfile!=1)
				throw new CHttpException(404,'CRON JOB update Photographer: the photographer #'.$photographerUpdate[$i].' is not a User, NewBie or Pros.');

			if($idUserProfile>=2 && $idUserProfile<=4){ //USER && NEWBIE && PROS
				//Verifico se le sue foto soddisfano i requisiti
				for($k=0; $k<$numPhotos; $k++){
					$rate=$modelUser->products[$k]->photo->rate;
					$totRate=$totRate+$rate;
					if($rate>=$minRate)
						$nPhoto++;
				}
				if($nPhoto>=$minNumber){
					$modelUser->idUserProfile=$newProfile;
					if(!$modelUser->save()) // Save new profile
						throw new CHttpException(404,'CRON JOB update Photographer: error while saving the idUserProfile of #'.$photographerUpdate[$i]);
					
					$message = new YiiMailMessage;
					$message->view = 'updatePhotographerStatus';
					$message->setBody(array('modelUser'=>$modelUser), 'text/html');
					$message->addTo($modelUser->email);
					$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
					$message->setSubject('You are now a '.$modelUser->idUserProfile0->name.' photographer');
					Yii::app()->mail->send($message);
				}
			}
				
			if($numPhotos>=100){
				if(!isset($modelUser->photographer)){
					$modelPhotographer = new Photographer; //create Photographer record
					$modelPhotographer->idUser=$photographerUpdate[$i];
					if(!$modelPhotographer->save())
						throw new CHttpException(404,'CRON JOB update Photographer: error while saving the modelPhotographer of #'.$photographerUpdate[$i]);
				}
			}
		}
	}

	private function checkBorderMap(&$lngNE){
		if($lngNE>180){
			$lngNE=$lngNE-360;
			return true;
		}else
		return false;
	}

	private function createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType){
		if($lngNE<$lngSW)
			$condition = 'idPhotoType='.$idPhotoType.
				' and photo.lat>'.$latSW.' and photo.lat<'.$latNE.
				' and photo.lng>'.$lngSW.' or photo.lng<'.$lngNE;
		else
			$condition = 'idPhotoType='.$idPhotoType.
				' and photo.lat>'.$latSW.' and photo.lat<'.$latNE.
				' and photo.lng>'.$lngSW.' and photo.lng<'.$lngNE;
		$rateCondition="";
		if($rate!=1)
			$rateCondition=' and rate>='.$rate;
		$categoryCondition="";
		if($cat!=0)
			$categoryCondition=' and (idCategory1=\''.$cat.'\' or idCategory2=\''.$cat.'\')';
		$with['photo']['condition']=$condition.$rateCondition.$categoryCondition;
		if($user!=""){
			$with['idUser0']['condition']='idUser0.username=\''.$user.'\'';
		}
		$shoppingOptCondition="";
		if($size!=1)
			$shoppingOptCondition=$shoppingOptCondition.'idSize>='.$size;
		/*if($minp!=0){
			if($shoppingOptCondition!="")
			$shoppingOptCondition=$shoppingOptCondition.' and ';
			$shoppingOptCondition=$shoppingOptCondition.'price>='.$minp;
			}
			if($maxp!=0){
			if($shoppingOptCondition!="")
			$shoppingOptCondition=$shoppingOptCondition.' and ';
			$shoppingOptCondition=$shoppingOptCondition.'price<='.$maxp;
			}*/
		if($lic!=0){
			if($shoppingOptCondition!="")
				$shoppingOptCondition=$shoppingOptCondition.' and ';
			if($lic==1 || $lic==2){
				$shoppingOptCondition=$shoppingOptCondition.'idLicense='.$lic;
				$with['idProduct0']['with']['shoppingPhotoType']['with']['shoppingOptPhotos']['condition']=$shoppingOptCondition;
			}elseif($lic==3){
				$with['idProduct0']['with']['shoppingPhotoType']['condition']="licenseType='RM'";
			}
		}
		/*if($kw!=""){
			$keywordsArray=str_getcsv($kw, ';', '"');
			$kwCondition="";
			for($c=0; $c<count($keywordsArray); $c++){
			if($c!=0)
			$kwCondition=$kwCondition.' or ';
			$kwCondition=$kwCondition.'keyword=\''.$keywordsArray[$c].'\'';
			}
			$with['idProduct0']['with']['keyword0']['condition']=$kwCondition;
			}*/
		$criteria=new CDbCriteria;
		$criteria->with=$with;

		return array('all'=>$criteria, 'rateCondition'=>$rateCondition, 'categoryCondition'=>$categoryCondition);
	}

	public function actionUpdateMap($latSW, $lngSW, $latNE, $lngNE, $zoom=0, $user="", $rate=1, $size=1, $minp=0, $maxp=0, $cat=0, $lic=0, $kw="", $idPhotoType=1){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');

		$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType);
		$criteria=$criteriaArray['all'];
		$countP=Product::model()->count($criteria);

		// TOP5
		//$this->gspLog("info", "Start Top5");
		$criteria->limit=6;
		$criteria->order="photo.rate DESC, photo.approvedDate DESC";
		$data=Product::model()->findAll($criteria);

		$totCounTop5=min(count($data), 5);
		$jsonTop5='';
		for($i=0; $i<$totCounTop5; $i++){
			if($i!=0)
			$jsonTop5 = $jsonTop5.",";
			$jsonTop5 = $jsonTop5."{\"id\":".$data[$i]->idProduct."}";
		}
		if(isset($data[5]))
		$offsetNext=1;
		else
		$offsetNext="null";
		//$this->gspLog("info", "End Top5");
		// END TOP5

		$json = "";
		$topPhotos = "";
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

			if($countP>$maxMarkers)
			$rate=$maxMarkers/$countP;
			else
			$rate=1;

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
						
					if($border)
					$condition = 'idPhotoType='.$idPhotoType.
							' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
							' and photo.lng>'.$lngSW_inner.' or photo.lng<'.$lngNE_inner;
					else
					$condition = 'idPhotoType='.$idPhotoType.
							' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
							' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner;
					$criteria->with['photo']['condition']=$condition.$criteriaArray['rateCondition'].$criteriaArray['categoryCondition'];
					$criteria->limit=-1;
					$countP_inner=Product::model()->count($criteria);
					$nMarkers_inner=ceil($countP_inner*$rate);
					//$this->gspLog("info", "End Counting cell ".$i."-".$k);
						
					if($nMarkers_inner<$countP_inner)
					$nMarkers_inner++;
					$nMarkers_inner=min($nMarkers_inner, $maxMarkersInner);

					$criteria->limit=$nMarkers_inner;
					$criteria->order="photo.rate DESC, photo.approvedDate DESC";
					$productList=Product::model()->findAll($criteria);
					$accept=0;
					$accepted=0;
						
					//$this->gspLog("info", "Start Cycling nMarkers.");
					for($j=0; $j<$nMarkers_inner; $j++){
						if(!$accept){// && !($i%2) && !(($k+($i/2))%2)){
							$accept=1;
							$dist=0;
							if($k>0){
								if($photoTopArray[$i][$k-1]['lng']!=null){
									//Se il rate è migliore del precedente allora lo prendo
									//if($photoTopArray[$i][$k-1]['rate']>=null){
									$dist=$productList[$j]->photo->lng - $photoTopArray[$i][$k-1]['lng'];
									if($dist<$lngWidthGrid/2)
									$accept=0;
								}
								if($i>0 & $accept){
									if($photoTopArray[$i-1][$k-1]['lng']!=null){
										$dist=$productList[$j]->photo->lng - $photoTopArray[$i-1][$k-1]['lng'];
										if($dist<$lngWidthGrid/2)
										$accept=0;
									}
								}
							}
							if($i>0 & $accept){
								if($photoTopArray[$i-1][$k]['lat']!=null){
									$latS=deg2rad($photoTopArray[$i-1][$k]['lat']);
									$latN=deg2rad($productList[$j]->photo->lat);
									$dist=log((tan($latS)-1/cos($latS))/(tan($latN)-1/cos($latN)));
									if($dist<$heightGrid/2)
									$accept=0;
								}
								if(($k+1)<$xGrid & $accept){
									if($photoTopArray[$i-1][$k+1]['lng']!=null){
										$dist=$photoTopArray[$i-1][$k+1]['lng'] - $productList[$j]->photo->lng;
										if($dist<$heightGrid/2)
										$accept=0;
									}
								}
							}
							$accepted=$accept;
						}
						if($accepted){
							if($countTopPhotos!=0)
							$topPhotos = $topPhotos.",";
							$photoTopArray[$i][$k]['id']=$productList[$j]->idProduct;
							$photoTopArray[$i][$k]['lat']=$productList[$j]->photo->lat;
							$photoTopArray[$i][$k]['lng']=$productList[$j]->photo->lng;
							$photoTopArray[$i][$k]['rate']=$productList[$j]->photo->rate;
							$topPhotos=$topPhotos."{\"id\":".$productList[$j]->idProduct.
								",\"lng\":".(float)$productList[$j]->photo->lng.
								",\"lat\":".(float)$productList[$j]->photo->lat.
								",\"src\":\"".$productList[$j]->idProduct0->getUrl('circle')."\"
								}";
							//$topPhotos=$topPhotos."{\"index\":".$j."}";
							$countTopPhotos++;
							$accepted=0;
						}else{
							if($totCount!=0)
							$json = $json.",";
							$json = $json."{\"id\":".$productList[$j]->idProduct.
								",\"lng\":".(float)$productList[$j]->photo->lng.
								",\"lat\":".(float)$productList[$j]->photo->lat.
								"}";
							$totCount++;//=$totCount+$nMarkers_inner;
						}
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
				$productList=Product::model()->findAll($criteria);
				$topPhotos = "{\"id\":".$productList[0]->idProduct.
					",\"lng\":".$productList[0]->photo->lng.
					",\"lat\":".$productList[0]->photo->lat.
					",\"src\":\"".$productList[0]->idProduct0->getUrl('circle')."\"".
					"}";
				//$topPhotos=$json;
				$json='';
			}
		}
		$json = "{\"photos\":[".$json."],\"count\": ".$totCount.",
			\"topPhotos\":[".$topPhotos."],\"countTopPhotos\":".$countTopPhotos.",
			\"topFive\":[".$jsonTop5."],\"countTopFive\":".$totCounTop5.",\"offsetNext\":".$offsetNext."
		}";
		echo $json;
	}

	public function actionUpdateMapSemp($apiKey, $latSW, $lngSW, $latNE, $lngNE, $zoom=0, $user="", $rate=1, $size=1, $minp=0, $maxp=0, $cat=0, $lic=0, $kw="", $idPhotoType=1, $orderBy="best"){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');
		 
		if($this->verifyApiKey($apiKey)){
			$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType);
			$criteria=$criteriaArray['all'];
			
			// Count total photos
			$totCntAllPhotos=Product::model()->count($criteria);
				
			// TOP5
			//$this->gspLog("info", "Start Top5");
			$criteria->limit=6;
			if($orderBy=="best")
				$criteria->order="photo.rate DESC, photo.approvedDate DESC";
			elseif($orderBy=="last")
				$criteria->order="photo.approvedDate DESC";
			$data=Product::model()->findAll($criteria);
				
			$totCounTop5=min(count($data), 5);
			$jsonTop5='';
			for($i=0; $i<$totCounTop5; $i++){
				if($i!=0)
				$jsonTop5 = $jsonTop5.",";
				$jsonTop5 = $jsonTop5."{\"id\":".$data[$i]->idProduct."}";
			}
			if(isset($data[5]))
				$offsetNext=1;
			else
				$offsetNext="null";
			//$this->gspLog("info", "End Top5");
			// END TOP5

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

						if($border)
						$condition = 'idPhotoType='.$idPhotoType.
								' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
								' and photo.lng>'.$lngSW_inner.' or photo.lng<'.$lngNE_inner;
						else
						$condition = 'idPhotoType='.$idPhotoType.
								' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
								' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner;
						$criteria->with['photo']['condition']=$condition.$criteriaArray['rateCondition'].$criteriaArray['categoryCondition'];
						//$this->gspLog("info", "End Counting cell ".$i."-".$k);

						$nMarkers_inner=$maxMarkersInner;
						$criteria->limit=$nMarkers_inner;
						$criteria->order="photo.rate DESC, photo.approvedDate DESC";
						$productList=Product::model()->findAll($criteria);
						$accept=1;
						$accepted=1; // NON FACCIO PIU' LA VERIFICA SULLA DISTANZA

						//$this->gspLog("info", "Start Cycling nMarkers.");
						for($j=0; $j<count($productList); $j++){
							if(!$accept){// && !($i%2) && !(($k+($i/2))%2)){
								$accept=1;
								$dist=0;
								if($k>0){
									if($photoTopArray[$i][$k-1]['lng']!=null){
										$dist=$productList[$j]->photo->lng - $photoTopArray[$i][$k-1]['lng'];
										if($dist<$lngWidthGrid/2)
										$accept=0;
									}
									if($i>0 & $accept){
										if($photoTopArray[$i-1][$k-1]['lng']!=null){
											$dist=$productList[$j]->photo->lng - $photoTopArray[$i-1][$k-1]['lng'];
											if($dist<$lngWidthGrid/2)
											$accept=0;
										}
									}
								}
								if($i>0 & $accept){
									if($photoTopArray[$i-1][$k]['lat']!=null){
										$latS=deg2rad($photoTopArray[$i-1][$k]['lat']);
										$latN=deg2rad($productList[$j]->photo->lat);
										$dist=log((tan($latS)-1/cos($latS))/(tan($latN)-1/cos($latN)));
										if($dist<$heightGrid/2)
										$accept=0;
									}
									if(($k+1)<$xGrid & $accept){
										if($photoTopArray[$i-1][$k+1]['lng']!=null){
											$dist=$photoTopArray[$i-1][$k+1]['lng'] - $productList[$j]->photo->lng;
											if($dist<$heightGrid/2)
											$accept=0;
										}
									}
								}
								$accepted=$accept;
							}
							if($accepted){
								if($countTopPhotos!=0)
								$topPhotos = $topPhotos.",";
								$photoTopArray[$i][$k]['id']=$productList[$j]->idProduct;
								$photoTopArray[$i][$k]['lat']=$productList[$j]->photo->lat;
								$photoTopArray[$i][$k]['lng']=$productList[$j]->photo->lng;
								$photoTopArray[$i][$k]['rate']=$productList[$j]->photo->rate;
								$topPhotos=$topPhotos."{\"id\":".$productList[$j]->idProduct.
									",\"lng\":".(float)$productList[$j]->photo->lng.
									",\"lat\":".(float)$productList[$j]->photo->lat.
									",\"src\":\"".$productList[$j]->idProduct0->getUrl('circle')."\"
									}";
								$countTopPhotos++;
								$accepted=0;
							}else{
								if($totCount!=0)
								$json = $json.",";
								$json = $json."{\"id\":".$productList[$j]->idProduct.
									",\"lng\":".(float)$productList[$j]->photo->lng.
									",\"lat\":".(float)$productList[$j]->photo->lat.
									"}";
								$totCount++;//=$totCount+$nMarkers_inner;
							}
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
					$productList=Product::model()->findAll($criteria);
					$topPhotos = "{\"id\":".$productList[0]->idProduct.
						",\"lng\":".$productList[0]->photo->lng.
						",\"lat\":".$productList[0]->photo->lat.
						",\"src\":\"".$productList[0]->idProduct0->getUrl('circle')."\"".
						"}";
					$json='';
				}
			}
			$json = "{\"totCntAllPhotos\": ".$totCntAllPhotos.",\"photos\":[".$json."],\"count\": ".$totCount.",
				\"topPhotos\":[".$topPhotos."],\"countTopPhotos\":".$countTopPhotos.",
				\"topFive\":[".$jsonTop5."],\"countTopFive\":".$totCounTop5.",\"offsetNext\":".$offsetNext."
			}";
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}
	
	public function actionUpdateMapNew($apiKey, $latSW, $lngSW, $latNE, $lngNE, $zoom=0, $user="", $rate=1, $size=1, $minp=0, $maxp=0, $cat=0, $lic=0, $kw="", $idPhotoType=1, $orderBy="best"){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');
		 
		if($this->verifyApiKey($apiKey)){
			$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType);
			$criteria=$criteriaArray['all'];
			
			// Count total photos
			$totCntAllPhotos=Product::model()->count($criteria);
				
			// TOP5
			//$this->gspLog("info", "Start Top5");
			$criteria->limit=15;
			if($orderBy=="best")
				$criteria->order="photo.rate DESC, photo.approvedDate DESC";
			elseif($orderBy=="last")
				$criteria->order="photo.approvedDate DESC";
			$data=Product::model()->findAll($criteria);
				
			$totCounTop5=min(count($data), 15);
			$jsonTop5='';
			for($i=0; $i<$totCounTop5; $i++){
				if($i!=0)
				$jsonTop5 = $jsonTop5.",";
				$jsonTop5 = $jsonTop5."{\"id\":".$data[$i]->idProduct."}";
			}
			if(isset($data[5]))
				$offsetNext=1;
			else
				$offsetNext="null";
			//$this->gspLog("info", "End Top5");
			// END TOP5

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

						if($border)
						$condition = 'idPhotoType='.$idPhotoType.
								' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
								' and photo.lng>'.$lngSW_inner.' or photo.lng<'.$lngNE_inner;
						else
						$condition = 'idPhotoType='.$idPhotoType.
								' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
								' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner;
						$criteria->with['photo']['condition']=$condition.$criteriaArray['rateCondition'].$criteriaArray['categoryCondition'];
						//$this->gspLog("info", "End Counting cell ".$i."-".$k);

						$nMarkers_inner=$maxMarkersInner;
						$criteria->limit=$nMarkers_inner;
						$criteria->order="photo.rate DESC, photo.approvedDate DESC";
						$productList=Product::model()->findAll($criteria);
						$accept=1;
						$accepted=1; // NON FACCIO PIU' LA VERIFICA SULLA DISTANZA

						//$this->gspLog("info", "Start Cycling nMarkers.");
						for($j=0; $j<count($productList); $j++){
							if(!$accept){// && !($i%2) && !(($k+($i/2))%2)){
								$accept=1;
								$dist=0;
								if($k>0){
									if($photoTopArray[$i][$k-1]['lng']!=null){
										$dist=$productList[$j]->photo->lng - $photoTopArray[$i][$k-1]['lng'];
										if($dist<$lngWidthGrid/2)
										$accept=0;
									}
									if($i>0 & $accept){
										if($photoTopArray[$i-1][$k-1]['lng']!=null){
											$dist=$productList[$j]->photo->lng - $photoTopArray[$i-1][$k-1]['lng'];
											if($dist<$lngWidthGrid/2)
											$accept=0;
										}
									}
								}
								if($i>0 & $accept){
									if($photoTopArray[$i-1][$k]['lat']!=null){
										$latS=deg2rad($photoTopArray[$i-1][$k]['lat']);
										$latN=deg2rad($productList[$j]->photo->lat);
										$dist=log((tan($latS)-1/cos($latS))/(tan($latN)-1/cos($latN)));
										if($dist<$heightGrid/2)
										$accept=0;
									}
									if(($k+1)<$xGrid & $accept){
										if($photoTopArray[$i-1][$k+1]['lng']!=null){
											$dist=$photoTopArray[$i-1][$k+1]['lng'] - $productList[$j]->photo->lng;
											if($dist<$heightGrid/2)
											$accept=0;
										}
									}
								}
								$accepted=$accept;
							}
							if($accepted){
								if($countTopPhotos!=0)
								$topPhotos = $topPhotos.",";
								$photoTopArray[$i][$k]['id']=$productList[$j]->idProduct;
								$photoTopArray[$i][$k]['lat']=$productList[$j]->photo->lat;
								$photoTopArray[$i][$k]['lng']=$productList[$j]->photo->lng;
								$photoTopArray[$i][$k]['rate']=$productList[$j]->photo->rate;
								$topPhotos=$topPhotos."{\"id\":".$productList[$j]->idProduct.
									",\"lng\":".(float)$productList[$j]->photo->lng.
									",\"lat\":".(float)$productList[$j]->photo->lat.
									",\"src\":\"".$productList[$j]->idProduct0->getUrl('circle')."\"
									}";
								$countTopPhotos++;
								$accepted=0;
							}else{
								if($totCount!=0)
								$json = $json.",";
								$json = $json."{\"id\":".$productList[$j]->idProduct.
									",\"lng\":".(float)$productList[$j]->photo->lng.
									",\"lat\":".(float)$productList[$j]->photo->lat.
									"}";
								$totCount++;//=$totCount+$nMarkers_inner;
							}
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
					$productList=Product::model()->findAll($criteria);
					$topPhotos = "{\"id\":".$productList[0]->idProduct.
						",\"lng\":".$productList[0]->photo->lng.
						",\"lat\":".$productList[0]->photo->lat.
						",\"src\":\"".$productList[0]->idProduct0->getUrl('circle')."\"".
						"}";
					$json='';
				}
			}
			$json = "{\"totCntAllPhotos\": ".$totCntAllPhotos.",\"photos\":[".$json."],\"count\": ".$totCount.",
				\"topPhotos\":[".$topPhotos."],\"countTopPhotos\":".$countTopPhotos.",
				\"topFive\":[".$jsonTop5."],\"countTopFive\":".$totCounTop5.",\"offsetNext\":".$offsetNext."
			}";
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}

	public function actionUpdateMapRequest($apiKey, $latSW, $lngSW, $latNE, $lngNE){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');
		 
		if($this->verifyApiKey($apiKey)){
			if($lngNE<$lngSW)
				$condition = 'lat>'.$latSW.' and lat<'.$latNE.
					' and lng>'.$lngSW.' or lng<'.$lngNE;
			else
				$condition = 'lat>'.$latSW.' and lat<'.$latNE.
					' and lng>'.$lngSW.' and lng<'.$lngNE;
			$criteria=new CDbCriteria;
			$criteria->condition=$condition;
			
			// Count total photos
			$totCntAllPhotoRequests=PhotoRequest::model()->count($criteria);

			$json = "";
			$topPhotoRequests = "";
			if($totCntAllPhotoRequests>1){
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
				for($i=0; $i<$yGrid; $i++){
					for($k=0; $k<$xGrid; $k++){
						if($border)
							$condition = 'lat>'.$latSW_inner.' and lat<'.$latNE_inner.
								' and lng>'.$lngSW_inner.' or lng<'.$lngNE_inner;
						else
							$condition = 'lat>'.$latSW_inner.' and lat<'.$latNE_inner.
								' and lng>'.$lngSW_inner.' and lng<'.$lngNE_inner;

						$nMarkers_inner=$maxMarkersInner;
						$criteria->limit=$nMarkers_inner;
						$criteria->order="insert_timestamp DESC";
						$requestList=PhotoRequest::model()->findAll($criteria);

						for($j=0; $j<count($requestList); $j++){
							if($totCount!=0)
								$json = $json.",";
							$json = $json."{\"id\":".$requestList[$j]->idPhotoRequest.
								",\"lng\":".(float)$requestList[$j]->lng.
								",\"lat\":".(float)$requestList[$j]->lat.
								"}";
							$totCount++;//=$totCount+$nMarkers_inner;
						}
						$lngSW_inner = $lngNE_inner;
						$lngNE_inner = $lngSW_inner + $lngWidthGrid;
						$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
					}
					$latSW_inner = $latNE_inner;
					$latNE_inner = rad2deg(atan(sinh($ySW+($i+2)*$heightGrid)));
					$lngSW_inner = $lngSW;
					$lngNE_inner = $lngSW_inner + $lngWidthGrid;
					$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
				}
			}else{
				if($totCntAllPhotoRequests==0){
					$totCount=0;
				}else if($totCntAllPhotoRequests==1){
					$totCount=1;
					$requestList=PhotoRequest::model()->findAll($criteria);
					$json = "{\"id\":".$requestList[0]->idPhotoRequest.
						",\"lng\":".(float)$requestList[0]->lng.
						",\"lat\":".(float)$requestList[0]->lat.
						"}";
				}
			}
			$json = "{\"totCntAllPhotoRequests\": ".$totCntAllPhotoRequests.",\"photoRequests\":[".$json."],\"count\": ".$totCount."}";
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}
	
	public function actionUpdateMapOpt($latSW, $lngSW, $latNE, $lngNE, $zoom=0, $user="", $rate=1, $size=1, $minp=0, $maxp=0, $cat=0, $lic=0, $kw="", $idPhotoType=1){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');

		$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType);
		$criteria=$criteriaArray['all'];
		$countP=Product::model()->count($criteria);

		// TOP5
		//$this->gspLog("info", "Start Top5");
		$criteria->limit=6;
		$criteria->order="photo.rate DESC, photo.approvedDate DESC";
		$data=Product::model()->findAll($criteria);

		$totCounTop5=min(count($data), 5);
		$jsonTop5='';
		for($i=0; $i<$totCounTop5; $i++){
			if($i!=0)
			$jsonTop5 = $jsonTop5.",";
			$jsonTop5 = $jsonTop5."{\"id\":".$data[$i]->idProduct."}";
		}
		if(isset($data[5]))
		$offsetNext=1;
		else
		$offsetNext="null";
		//$this->gspLog("info", "End Top5");
		// END TOP5

		$json = "";
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

			if($countP>$maxMarkers)
			$rate=$maxMarkers/$countP;
			else
			$rate=1;

			$latSW_inner = $latSW;
			$latNE_inner = rad2deg(atan(sinh($ySW+$heightGrid)));
			$lngSW_inner = $lngSW;
			$lngNE_inner = $lngSW_inner + $lngWidthGrid;
			$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
			$totCount=0;
			$photoTopArray;
			for($i=0; $i<$yGrid; $i++){
				for($k=0; $k<$xGrid; $k++){
					//$this->gspLog("info", "Start Elaboration cell ".$i."-".$k);
					$photoTopArray[$i][$k]['id']=null;
						
					if($border)
					$condition = 'idPhotoType='.$idPhotoType.
							' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
							' and photo.lng>'.$lngSW_inner.' or photo.lng<'.$lngNE_inner;
					else
					$condition = 'idPhotoType='.$idPhotoType.
							' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
							' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner;
					$criteria->with['photo']['condition']=$condition.$criteriaArray['rateCondition'].$criteriaArray['categoryCondition'];
					$criteria->limit=-1;
					$countP_inner=Product::model()->count($criteria);
						
					//$this->gspLog("info", "End Counting cell ".$i."-".$k);
					$nMarkers_inner=ceil($countP_inner*$rate);
					//Eliminare conteggio totali, fare direttamente la ricerca con il limite e poi verificare se il count sia minore del limite.
					if($nMarkers_inner<$countP_inner)
					$nMarkers_inner++;
					$nMarkers_inner=min($nMarkers_inner, $maxMarkersInner);

					$criteria->limit=$nMarkers_inner;
					$criteria->order="photo.rate DESC, photo.approvedDate DESC";
					$productList=Product::model()->findAll($criteria);
					$accept=1;
					$photoTopArray[$i][$k]['id']=null;
					for($j=0; $j<$nMarkers_inner; $j++){
						//$this->gspLog("info", "nMarkers=".$j);
						if($accept){
							$photoTopArray[$i][$k]['id']=$productList[$j]->idProduct;
							$photoTopArray[$i][$k]['lat']=$productList[$j]->photo->lat;
							$photoTopArray[$i][$k]['lng']=$productList[$j]->photo->lng;
							$photoTopArray[$i][$k]['src']=$productList[$j]->idProduct0->getUrl('circle');
							$photoTopArray[$i][$k]['rate']=$productList[$j]->photo->rate;
							$accept=0;
						}else{
							if($totCount!=0)
							$json = $json.",";
							$json = $json."{\"id\":".$productList[$j]->idProduct.
								",\"lng\":".(float)$productList[$j]->photo->lng.
								",\"lat\":".(float)$productList[$j]->photo->lat.
								"}";
							$totCount++;
						}
					}
					//then update lng
					$lngSW_inner = $lngNE_inner;
					$lngNE_inner = $lngSW_inner + $lngWidthGrid;
					$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
				}
				$latSW_inner = $latNE_inner;
				$latNE_inner = rad2deg(atan(sinh($ySW+($i+2)*$heightGrid)));
				$lngSW_inner = $lngSW;
				$lngNE_inner = $lngSW_inner + $lngWidthGrid;
				$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
			}
				
			//$this->gspLog("info", "Counting Nearby");
			for($i=0; $i<$yGrid; $i++){
				for($k=0; $k<$xGrid; $k++){
					if($photoTopArray[$i][$k]['id']!=null){
						$cntNearby=0;
						for($i2=max(0, $i-1); $i2<=min($i+1, $yGrid-1); $i2++){
							for($k2=max(0, $k-1); $k2<=min($k+1, $xGrid-1); $k2++){
								if($photoTopArray[$i2][$k2]['id']!=null){
									$cntNearby++;
								}
							}
						}
						$photoTopArray[$i][$k]['cntNearby']=$cntNearby-1;
					}
				}
			}
			$cntNearbyMax=1;
			$rateMin=6;
			while($cntNearbyMax>0){
				//$this->gspLog("info", "Cycling Elimination Nearby");
				$cntNearbyMax=0;
				for($i=0; $i<$yGrid; $i++){
					for($k=0; $k<$xGrid; $k++){
						if($photoTopArray[$i][$k]['id']!=null){
							if($photoTopArray[$i][$k]['cntNearby']>0){
								if($photoTopArray[$i][$k]['rate']<$rateMin){
									$cntNearbyMax=$photoTopArray[$i][$k]['cntNearby'];
									$rateMin=$photoTopArray[$i][$k]['rate'];
									$iToRemove=$i;
									$kToRemove=$k;
								}elseif($photoTopArray[$i][$k]['cntNearby']>$cntNearbyMax && $photoTopArray[$i][$k]['rate']==$rateMin){
									$cntNearbyMax=$photoTopArray[$i][$k]['cntNearby'];
									$rateMin=$photoTopArray[$i][$k]['rate'];
									$iToRemove=$i;
									$kToRemove=$k;
								}
							}
						}
					}
				}
				//$this->gspLog("info", "Update Nearby");
				if($cntNearbyMax>0){
					$photoTopArray[$iToRemove][$kToRemove]['id']=null;
					for($i=max(0, $iToRemove-1); $i<=min($iToRemove+1, $yGrid-1); $i++){
						for($k=max(0, $kToRemove-1); $k<=min($kToRemove+1, $xGrid-1); $k++){
							if($photoTopArray[$i][$k]['id']!=null){
								if($photoTopArray[$i][$k]['cntNearby']!=null){
									$photoTopArray[$i][$k]['cntNearby']--;
								}
							}
						}
					}
				}
			}
				
			//$this->gspLog("info", "Write Json");
			$countTopPhotos=0;
			$topPhotos = "";
			for($i=0; $i<$yGrid; $i++){
				for($k=0; $k<$xGrid; $k++){
					if($photoTopArray[$i][$k]['id']!=null){
						if($countTopPhotos!=0)
						$topPhotos = $topPhotos.",";
						$topPhotos=$topPhotos."{\"id\":".$photoTopArray[$i][$k]['id'].
							",\"lng\":".(float)$photoTopArray[$i][$k]['lng'].
							",\"lat\":".(float)$photoTopArray[$i][$k]['lat'].
							",\"src\":\"".$photoTopArray[$i][$k]['src']."\"
							}";
						$countTopPhotos++;
					}
				}
			}
			/*for($i=0; $i<$yGrid; $i++){
				for($k=0; $k<$xGrid; $k++){
				if($photoTopArray[$i][$k]['cntNearby']!=null){
				if($photoTopArray[$i][$k]['cntNearby']>0){
				$cntNearbyMax=$photoTopArray[$i][$k]['cntNearby'];
				$iToRemove=$i;
				$kToRemove=$k;
				for($i2=max(0, $i-1); $i2<=$i+1; $i2++){
				for($k2=max(0, $k-1); $k2<=$k+1; $k2++){
				if($photoTopArray[$i2][$k2]['cntNearby']!=null){
				if($photoTopArray[$i2][$k2]['cntNearby']>$cntNearbyMax){
				$cntNearbyMax=$photoTopArray[$i2][$k2]['cntNearby'];
				$iToRemove=$i2;
				$kToRemove=$k2;
				}
				}
				}
				}
				$photoTopArray[$i2][$k2]['id']=null;
				}
				}
				}
				}*/
		}else{
			if($countP==0){
				$totCount=0;
				$countTopPhotos=0;
			}else if($countP==1){
				$totCount=0;
				$countTopPhotos=1;
				$productList=Product::model()->findAll($criteria);
				$topPhotos = "{\"id\":".$productList[0]->idProduct.
					",\"lng\":".$productList[0]->photo->lng.
					",\"lat\":".$productList[0]->photo->lat.
					",\"src\":\"".$productList[0]->idProduct0->getUrl('circle')."\"".
					"}";
				//$topPhotos=$json;
				$json='';
			}
		}
		$json = "{\"photos\":[".$json."],\"count\": ".$totCount.",
			\"topPhotos\":[".$topPhotos."],\"countTopPhotos\":".$countTopPhotos.",
			\"topFive\":[".$jsonTop5."],\"countTopFive\":".$totCounTop5.",\"offsetNext\":".$offsetNext."
		}";
		echo $json;
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

	// START API
	public function actionGetSearch($apiKey=null, $latSW=-85, $lngSW=-180, $latNE=85, $lngNE=180, $limit=100, $user="", $rate=1, $idSize=1, $idCategory=0, $thumb=null){
		header('Content-type: text/json');
		header('Access-Control-Allow-Origin: *');
		 
		if($this->verifyApiKey($apiKey)){
			$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $idSize, $idCategory, 1, 1);
			$criteria=$criteriaArray['all'];
			$criteria->limit=$limit;
			$criteria->order="photo.rate DESC";
			$productList=Product::model()->findAll($criteria);
				
			$photo="";
			for($i=0; $i<count($productList); $i++){
				if($i!=0)
					$photo=$photo.",";
				$photo=$photo.
					"{\"id\":".$productList[$i]->idProduct.
					",\"lng\":".(float)$productList[$i]->photo->lng.
					",\"lat\":".(float)$productList[$i]->photo->lat;
				if(isset($thumb))
					$photo=$photo.",\"src\":\"".$productList[$i]->idProduct0->getUrl($thumb)."\"";
				$photo=$photo."}";
			}
			$json = "{\"photo\":[".$photo."],\"count\": ".count($productList)."}";
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}

	public function actionGetInfo($apiKey=null, $id){
		if($this->verifyApiKey($apiKey)){
			header('Content-type: text/json');
			header('Access-Control-Allow-Origin: *');

			$modelProduct=Product::model()->findByPk($id);

			if($modelProduct->photo->idCategory2!="")
			$jsonCat2=",\"idCategory2\":".$modelProduct->photo->idCategory2;
			else
			$jsonCat2="";

			if(isset($modelProduct)){
				$json="";
				for($i=0; $i<count($modelProduct); $i++){
					$json=$json.
						"{\"idUser\":".$modelProduct->idUser.
						",\"title\":\"".$modelProduct->title."\"".
						",\"description\":\"".$modelProduct->description."\"".
						",\"lng\":".$modelProduct->photo->lng.
						",\"lat\":".$modelProduct->photo->lat.
						",\"idCategory1\":".$modelProduct->photo->idCategory1.
					$jsonCat2.
						",\"rate\":".$modelProduct->photo->rate.
						",\"approvedDate\":\"".
					Yii::app()->dateFormatter->format('dd/MMM/yyyy - hh:mm', $modelProduct->photo->approvedDate)."\"".
					"}";
				}
			}else{
				$json = "{\"errCode\":002}";
			}
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}

	public function actionGetConfCategory($apiKey=null){
		if($this->verifyApiKey($apiKey)){
			header('Content-type: text/json');
			header('Access-Control-Allow-Origin: *');

			$criteria=new CDbCriteria;
			$criteria->condition='idPhotoType=1';
			$categories=ConfCategory::model()->findAll($criteria);

			if(isset($categories)){
				$json="";
				for($i=0; $i<count($categories); $i++){
					if($i!=0)
					$json=$json.",";
					$json=$json.
						"{\"idCategory\":".$categories[$i]->idCategory.
						",\"name\":\"".$categories[$i]->name."\"".
					"}";
				}
				$json = "{\"category\":[".$json."]}";
			}else{
				$json = "{\"errCode\":002}";
			}
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}

	public function actionGetConfSize($apiKey=null){
		if($this->verifyApiKey($apiKey)){
			header('Content-type: text/json');
			header('Access-Control-Allow-Origin: *');

			$sizes=ConfSize::model()->findAll();

			if(isset($sizes)){
				$json="";
				for($i=1; $i<count($sizes); $i++){
					if($i!=1)
						$json=$json.",";
					$json=$json.
						"{\"idSize\":".$sizes[$i]->idSize.
						",\"code\":\"".$sizes[$i]->code."\"".
						",\"maxSize\":".$sizes[$i]->maxSize.
					"}";
				}
				$json = "{\"size\":[".$json."]}";
			}else{
				$json = "{\"errCode\":002}";
			}
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}
	
	public function actionDownloadAPI($id, $idSize, $apiKey, $SECURE_SESSION_ID){
    	header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
		$json = "{\"errCode\":002}";
		
		$criteria=new CDbCriteria;
		//$criteria->condition='username=\''.$username.'\'';
		$criteria->with['apiKey']['condition']="apiKey='".$apiKey."'";
		$model=User::model()->find($criteria);
				
		if(count($model)==1){
			$enableSession=$model->verifySessionIdSecureByValue($SECURE_SESSION_ID, 1);
			if($model->verifyApiKey($apiKey , 1) && $enableSession){
				$checkTransaction=false;
				$modelProductPp=$this->loadModel($id);
				$sizePx = ConfSize::model()->findByPk($idSize)->maxSize;
		
				// Verifico se sono autorizzato a scaricare la foto
				$timeWindow=ConfParameters::model()->findByPk("TimeWindowPhotoDownload");
				$timeWindow = time() - floatval($timeWindow->value); // 2 weeks before
				$timeWindow = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss', $timeWindow).'.000';
				$criteria=new CDbCriteria;
				$criteria->condition='t.idProduct=:idProduct AND t.insert_timestamp>=:insert_timestamp';
				$criteria->params=array(':idProduct'=>$id, ':insert_timestamp'=>$timeWindow);
				$criteria->with['idTransaction0']['condition']='idTransaction0.idUser='.$model->idUser;
				$criteria->with['transactionPhotoRfs']['condition']='transactionPhotoRfs.idSize='.$idSize;
				$transaction=TransactionPhoto::model()->findAll($criteria);
				if(count($transaction)>0)
					$checkTransaction=true;
		
				if($checkTransaction){
					$path=$modelProductPp->getLocalPath('full');
					$img = Yii::app()->imagemod->load($path);
		
					if(!isset($img))
						throw new CHttpException(404, 'Download photo: something went wrong while loading the photo #'.$id);
					$img->image_resize = true;
					$img->image_ratio = true;
					$img->image_x = $sizePx;
					$img->image_y = $sizePx;
					$img->file_new_name_body = md5($img->file_src_name);
					header('Content-type: '.$img->file_src_mime);
					echo $img->process();
					if(!$img->processed)
						throw new CHttpException(404,'Download upload: '.$img->error.' [#'.$id.']');
						
					if(Yii::app()->params['useBlob']){
						if(file_exists($path)){
							$img->clean();
						}
					}
				}
			}
		}
		echo $json;
	}
	// END API

	/*
	 public function actionCollectDistributedPhotos($idPhotoType=1, $filename=""){
		$countP=Product::model()->with(array('photo'=>array('condition'=>'photo.idPhotoType='.$idPhotoType)))->count();

		$latSW = -85;
		$latNE = +85;
		$lngSW = -180;
		$lngNE = +180;
		$latSW_rad = deg2rad($latSW);
		$latNE_rad = deg2rad($latNE);
		$height = log((tan($latSW_rad)-1/cos($latSW_rad))/(tan($latNE_rad)-1/cos($latNE_rad)));
		$heightGrid = $height/YGRID;
		$ySW=log((1+sin($latSW_rad))/cos($latSW_rad));

		if($lngNE >= $lngSW)
		$lngWidth = $lngNE - $lngSW;
		else{
		$lngWidth = ($lngNE+180) + (180-$lngSW);
		}
		$lngWidthGrid = $lngWidth/XGRID;

		$json = "var data = {\"photos\": [";
		if($countP>MAX_MARKERS)
		$rate=MAX_MARKERS/$countP;
		else
		$rate=1;
		$latSW_inner = $latSW;
		$latNE_inner = rad2deg(atan(sinh($ySW+$heightGrid)));
		$lngSW_inner = $lngSW;
		$lngNE_inner = $lngSW_inner + $lngWidthGrid;
		$totCount=0;
		for($i=0; $i<YGRID; $i++){
		for($k=0; $k<XGRID; $k++){
		//do everything
		$countP_inner=Product::model()->with(array('photo'=>array('condition'=>
		'photo.idPhotoType='.$idPhotoType.
		' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
		' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner
		)))->count();
		$nMarkers_inner=ceil($countP_inner*$rate);
		$nMarkers_inner=min($nMarkers_inner, MAX_MARKERS_INNER);

		$criteria=new CDbCriteria;
		$criteria->with=array('photo'=>array('condition'=>
		'photo.idPhotoType='.$idPhotoType.
		' and photo.lat>'.$latSW_inner.' and photo.lat<'.$latNE_inner.
		' and photo.lng>'.$lngSW_inner.' and photo.lng<'.$lngNE_inner
		));
		$criteria->order='rate DESC';
		$productDataProvider = new CActiveDataProvider('Product', array(
		'criteria'=>$criteria,
		'pagination'=>array('pageSize'=>$nMarkers_inner)
		));
		$productList=$productDataProvider->getData();
		for($j=0; $j<count($productList); $j++){
		$json = $json."{\"idProduct\": ".$productList[$j]->idProduct.
		",\"lng\": ".$productList[$j]->photo->lng.
		",\"lat\": ".$productList[$j]->photo->lat.
		"},";
		}
		$totCount=$totCount+count($productList);
		echo count($productList).' - ';
		//then update lng
		$lngSW_inner = $lngNE_inner;
		$lngNE_inner = $lngSW_inner + $lngWidthGrid;
		}
		echo "<br>";
		$latSW_inner = $latNE_inner;
		$latNE_inner = rad2deg(atan(sinh($ySW+($i+2)*$heightGrid)));
		$lngSW_inner = $lngSW;
		$lngNE_inner = $lngSW_inner + $lngWidthGrid;
		}
		$json = $json."], \"count\": ".$totCount."}";
		echo $json;
		$file=dirname(Yii::app()->request->scriptFile).'/js/controller/photo/dataD'.$filename.'.js';
		$fh = fopen($file, 'w') or die("can't open file");
		fwrite($fh, $json);
		fclose($fh);
		}
		*/

	public $user;
	public $idPhotoType=1;
	public function actionIndex($user="", $location=""){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		$this->user=$user;
		$this->idPhotoType=1;

		//echo CHttpRequest::getUserHostAddress();
		//$country = Yii::app()->geoip->lookupLocation('93.50.181.78')->countryName;
		if(Yii::app()->controller->showMap($user, $location, 1))
			throw new CHttpException(404,'Internal error.');
	}

	public function actionOndemand($location=""){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);

		if(Yii::app()->controller->showMapRequests($location))
			throw new CHttpException(404,'Internal error.');
	}

	public function actionBreakingnews($user="", $location=""){
		$this->user=$user;
		$this->pageName="Breaking News";
		$this->layout='//layouts/mainSuapa';
		$this->idPhotoType=2;
		if(Yii::app()->controller->showMap($user, $location, 2))
		throw new CHttpException(404,'Internal error.');
	}

	private function showMap($user, $location, $idPhotoType){
		$criteria=new CDbCriteria;
		$criteria->select='t.idProduct, t.lat, t.lng';
		$criteria->condition='idPhotoType=:idPhotoType';
		$criteria->params=array(':idPhotoType'=>$idPhotoType);
		if($user!='')
			$criteria->with['product']['with']['idUser0']['condition']='username=\''.$user.'\'';
		$criteria->order='t.rate DESC, approvedDate DESC';
		$criteria->limit=1;
		$data=Photo::model()->find($criteria);

		if(isset($data->idProduct) & isset($data->lat) & isset($data->lng)){
			$idProduct=$data->idProduct;
			$lat = $data->lat;
			$lng = $data->lng;
		}else{
			$idProduct=null;
			$lat = 1000;
			$lng = 1000;
		}
		Yii::app()->controller->onloadFunctions="initializeMapIndexDistr($lat, $lng, '$user', '$location', $idPhotoType)";
		$this->render('index',array(
			'idProduct'=>$idProduct
		));
	}

	private function showMapRequests($location){
		$criteria=new CDbCriteria;
		$criteria->select='t.idPhotoRequest, t.lat, t.lng';
		$criteria->order='insert_timestamp DESC';
		$criteria->limit=1;
		$data=PhotoRequest::model()->find($criteria);

		if(isset($data->idPhotoRequest) & isset($data->lat) & isset($data->lng)){
			$idPhotoRequest=$data->idPhotoRequest;
			$lat = $data->lat;
			$lng = $data->lng;
		}else{
			$idPhotoRequest=null;
			$lat = 1000;
			$lng = 1000;
		}
		Yii::app()->controller->onloadFunctions="initializeMapRequest($lat, $lng, '$location')";
		$this->render('photoRequest',array('idPhotoRequest'=>$idPhotoRequest));
	}

	public function actionShowInfoPhoto($id, $refreshSC=false){
		$this->widget('application.components.widgets.ProductInfo', array('id'=>$id, 'zoom'=>true, 'showOuter'=>false, 'refreshSC'=>$refreshSC));
	}

	public function actionShowInfoPhotoNew($id){
		$this->widget('application.components.widgets.ProductInfoNew', array('id'=>$id));
	}

	public function actionShowInfoPhotoRequest($id){
		$this->widget('application.components.widgets.PhotoRequestInfo', array('idPhotoRequest'=>$id, 'showOuter'=>false));
	}

	public function actionTopten($latSW=-90, $lngSW=-180, $latNE=90, $lngNE=180, $zoom=0, $user="", $rate=1, $size=1, $cat=0, $lic=0, $idPhotoType=1, $offset=0, $orderBy="best", $showPage=0){
		$criteriaArray=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE, $user, $rate, $size, $cat, $lic, $idPhotoType);
		$criteria=$criteriaArray['all'];
		if($orderBy=="best")
			$criteria->order='photo.rate DESC, photo.approvedDate DESC';
		elseif($orderBy=="last")
			$criteria->order='photo.approvedDate DESC';
		$criteria->limit=$offset*5+6;
		$data=Product::model()->findAll($criteria);

		$offset_pre=$offset-1;
		if(isset($data[$offset*5+5])){
			$offset_next=$offset+1;
		}else{
			$offset_next=null;
		}
		$data=array_slice($data, $offset*5, 5);

		$this->renderPartial('topTen', array(
			'topten'=>$data,
			'offset_next'=>$offset_next,
			'offset_pre'=>$offset_pre,
			'idPhotoType'=>$idPhotoType,
			'orderBy'=>$orderBy,
			'user'=>$user,
			'showPage'=>$showPage
		), false, true);
	}

	public function actionToptenFast($id0=null, $id1=null, $id2=null, $id3=null, $id4=null, $offsetNext=0, $orderBy="best", $showPage=0){
		$arrayId=array($id0, $id1, $id2, $id3, $id4);
		for($i=0; $i<5; $i++){
			if($arrayId[$i]!=null){
				$data[$i]=Product::model()->findByPk($arrayId[$i]);
			}
		}
		if($id0!=null){
			$this->renderPartial('topTen', array(
				'topten'=>$data,
				'offset_next'=>$offsetNext,
				'offset_pre'=>-1,
				'idPhotoType'=>1,
				'user'=>"",
				'orderBy'=>$orderBy,
				'showPage'=>$showPage
			), false, true);
		}
	}

	public function actionListFast($id0=null, $id1=null, $id2=null, $id3=null, $id4=null, $id5=null, $id6=null, $id7=null, $id8=null, $id9=null, $id10=null, $id11=null, $id12=null, $id13=null, $id14=null, $offsetNext=0, $orderBy="best", $showPage=0){
		$arrayId=array($id0, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $id11, $id12, $id13, $id14);
		for($i=0; $i<15; $i++){
			if($arrayId[$i]!=null){
				$data[$i]=Product::model()->findByPk($arrayId[$i]);
			}
		}
		if($id0!=null){
			$this->renderPartial('list', array(
				'topten'=>$data,
				'offset_next'=>$offsetNext,
				'offset_pre'=>-1,
				'idPhotoType'=>1,
				'user'=>"",
				'orderBy'=>$orderBy,
				'showPage'=>$showPage
			), false, false);
		}
	}

	public function actionView($id, $title=""){
		$this->layout='//layouts/operative';
		$modelProductPp=$this->loadModel($id);
		if($title=="")
			$this->redirect(array('photo/view'.'/'.$id.'/'.$modelProductPp->urlTitle));

		if(!isset($modelProductPp->idProductStatus))
			throw new CHttpException(404,'Photo view: something went wrong while retrieving the status of the photo #'.$id);
		if($modelProductPp->idProductStatus=='1')
			throw new CHttpException(404,'Photo #'.$id.' has not been submitted yet.');
		if($modelProductPp->idProductStatus=='5' | $modelProductPp->idProductStatus=='2')
			throw new CHttpException(404,'Photo #'.$id.' is still waiting for review.');
		//if($modelProductPp->idProductStatus=='4')
			//throw new CHttpException(404,'Photo #'.$id.' has been rejected.');
		if($modelProductPp->idProductStatus=='6')
			throw new CHttpException(404,'Photo #'.$id.' has been deleted.');
		if($modelProductPp->idProductStatus=='7' && $modelProductPp->idUser!=Yii::app()->user->id)
			throw new CHttpException(404,'Someone has reported an abuse on photo #'.$id);
		//if(!isset($modelProductPp->product))
			//throw new CHttpException(404,'Something went wrong while retrieving info about the photo #'.$id);

		$modelProductPp->visits++;
		if(!$modelProductPp->save())
			throw new CHttpException(404, 'View photo: something went wrong while updating the visit number.');

		//$modelProduct=$modelProductPp->product;
		if(!isset($modelProductPp->photoPrePost->lat))
			throw new CHttpException(404,'Something went wrong while retrieving latitude information of the photo #'.$id);
		if(!isset($modelProductPp->photoPrePost->lng))
			throw new CHttpException(404,'Something went wrong while retrieving longitude information of the photo #'.$id);
		$lat=$modelProductPp->photoPrePost->lat;
		$lng=$modelProductPp->photoPrePost->lng;

		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/jsSuapa/jquery.lightbox-0.5.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile('//assets.pinterest.com/js/pinit.js', CClientScript::POS_HEAD);

		if((Yii::app()->controller->onloadFunctions=$modelProductPp->idUser0->urlTopPhotosUser."; 
			initializeMapHome($lat, $lng, null, null, 1, 12)")!=0)
		throw new CHttpException(404,'Something went wrong while loading the map.');
			
		$this->render('view',array('modelProductPp'=>$modelProductPp, 'vote'=>false));
	}
	
	public function actionGetPosition($idProduct){
		$modelPhotoPp=PhotoPrePost::model()->findByPk($idProduct);
		$arr = array(
			'lat'=>$modelPhotoPp->lat,
			'lng'=>$modelPhotoPp->lng
		);
		echo json_encode($arr);
	}

	public function actionAjaxViewIncrementCount($id){
		$modelProductPp=$this->loadModel($id);

		if(!isset($modelProductPp->idProductStatus))
		throw new CHttpException(404,'Photo view: something went wrong while retrieving the status of the photo #'.$id);
		if($modelProductPp->idProductStatus=='1')
		throw new CHttpException(404,'Photo #'.$id.' has not been submitted yet.');
		if($modelProductPp->idProductStatus=='2')
		throw new CHttpException(404,'Photo #'.$id.' is still waiting for review.');
		if($modelProductPp->idProductStatus=='4')
		throw new CHttpException(404,'Photo #'.$id.' has been rejected.');
		if($modelProductPp->idProductStatus=='5' | $modelProductPp->idProductStatus=='6')
		throw new CHttpException(404,'Photo #'.$id.' has been deleted.');
		if($modelProductPp->idProductStatus=='7')
		throw new CHttpException(404,'Someone has reported an abuse on photo #'.$id);
		if(!isset($modelProductPp->product))
		throw new CHttpException(404,'Something went wrong while retrieving info about the photo #'.$id);

		$modelProductPp->visits++;
			
		if(!$modelProductPp->save())
		throw new CHttpException(404, 'View photo: something went wrong while updating the visit number.');
			
		echo $modelProductPp->visits;
	}

	public function actionReportAuthor(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUserSlave=:idUserSlave';
		$criteria->params=array(':idUserSlave'=>Yii::app()->user->id);
		$dataOwnSwitchUser = OwnSwitchUser::model()->findAll($criteria);

		if(count($dataOwnSwitchUser)==0)
		throw new CHttpException(404,'You are not authorized to see this page.');

		$criteria=new CDbCriteria;
		$criteria->with['idProduct0']['condition']='idUser='.Yii::app()->user->id.
			' and idProductStatus!=8';
		$criteria->condition='idCategory1 is not null';
		$numCat1 = MasterAction::model()->count($criteria);
		// Considerando che l'inserimento della categorie è obbligatorio
		$tot=$numCat1;

		$criteria->condition='lat is not null and lng is not null';
		$numPos = MasterAction::model()->count($criteria);
			
		$photographers=array();
		array_push($photographers, array(
			'username'=>$dataOwnSwitchUser[0]->idUserSlave0->username,
			'numCat1'=>$numCat1,
			'numPos'=>$numPos,
			'tot'=>$tot
		));

		$criteria=new CDbCriteria;
		$criteria->condition='idProductStatus=:idProductStatus AND idUser=:idUser';
		$criteria->params=array(':idProductStatus'=>5, ':idUser'=>Yii::app()->user->id);
		$numPendingSubmit=ProductPrePost::model()->count($criteria);

		$criteria=new CDbCriteria;
		$notExists=" and NOT EXISTS (select * from tbl_master_action b where t.idProduct=b.idProduct)";
		$criteria->condition='idUser='.Yii::app()->user->id.' and idProductStatus=8'.$notExists;
		$numPrePending=ProductPrePost::model()->count($criteria);

		$this->render('reportEditor',array(
			'photographers'=>$photographers,
			'numCat1'=>$numCat1,
			'numPos'=>$numPos,
			'costCat1'=>0.01,
			'costPos'=>0.1,
			'tot'=>$tot,
			'author'=>true,
			'numPendingSubmit'=>$numPendingSubmit,
			'numPrePending'=>$numPrePending
		));
	}

	public function actionReportEditor(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster=:idUserMaster';
		$criteria->params=array(':idUserMaster'=>Yii::app()->user->id);
		$dataOwnSwitchUser = OwnSwitchUser::model()->findAll($criteria);

		if(count($dataOwnSwitchUser)==0)
		throw new CHttpException(404,'You are not authorized to see this page.');

		$photographers=array();
		for($i=0; $i<count($dataOwnSwitchUser); $i++){
			$criteria=new CDbCriteria;
			$criteria->condition='idUserMaster=:idUserMaster';
			$criteria->with['idProduct0']['condition']='idUser='.$dataOwnSwitchUser[$i]->idUserSlave.
				' and idProductStatus!=8';
			$criteria->params=array(':idUserMaster'=>Yii::app()->user->id);
			$tot = MasterAction::model()->count($criteria);
				
			$criteria->condition='idUserMaster=:idUserMaster and idCategory1 is not null';
			$numCat1 = MasterAction::model()->count($criteria);
				
			$criteria->condition='idUserMaster=:idUserMaster and lat is not null and lng is not null';
			$numPos = MasterAction::model()->count($criteria);
				
			array_push($photographers, array(
					'username'=>$dataOwnSwitchUser[$i]->idUserSlave0->username,
					'numCat1'=>$numCat1,
					'numPos'=>$numPos,
					'tot'=>$tot
			)
			);
		}

		$this->render('reportEditor',array(
			'photographers'=>$photographers,
			'numCat1'=>$numCat1,
			'numPos'=>$numPos,
			'costCat1'=>0.005,
			'costPos'=>0.05,
			'tot'=>$tot,
			'author'=>false
		));
	}

	private function createFtpBlobClient(){
		$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob(
			'blob.core.windows.net',
		STORAGE_FTP_ACCOUNT_NAME,
		STORAGE_FTP_ACCOUNT_KEY
		);
		return $blobStorageClient;
	}

	public function actionCronJobFtpFiles(){
		//echo "###".date("d/m/Y H:i:s")."###".time();
		$now=time();
		$countPhotosProcessed=0;
		$photosProcessedLimit=intval(ConfParameters::model()->findByPk("ProcessedFtpFilesLimit")->value);
		$stringResult="START CronJob FTP files Action<br><br>\n\n ";
		$blobStorageClient=$this->createFtpBlobClient();

		$criteria=new CDbCriteria;
		$criteria->condition='idUser is not null and idUser!=1 and enable=1';
		$ftpAccountEnabled=FtpAccount::model()->findAll($criteria);
		// cicla tra tutti gli account ftp abilitati
		for($i=0; $i<count($ftpAccountEnabled); $i++){
			$container=$ftpAccountEnabled[$i]->username;
			if($blobStorageClient->containerExists($container)){
				$stringResult=$stringResult.$container.'<br>\n ';
				$listBlobs=$blobStorageClient->listBlobs($container);
				// aggiorno il timestamp se contiene almeno un file
				if(count($listBlobs)>0){
					if(!$ftpAccountEnabled[$i]->save())
						throw new CHttpException(404, 'Upload FTP photo: something went wrong while saving the timestamp');
				}
				$exception=false;
				$msg="";
				// Cicla tra tutti i file dell'utente
				for($j=0; $j<count($listBlobs); $j++){
					$lastModified=$listBlobs[$j]->lastModified."#";
					$lastModified=substr($lastModified, 5, 21);
					$lastModified=strtotime($lastModified);
					if(($now-$lastModified)>1800){ //30min
						$countPhotosProcessed++;
						if($countPhotosProcessed>$photosProcessedLimit){
							$stringResult=$stringResult.'There are other files to be processed!';
							break 2; //Esci da entrambi i cicli for
						}
						$modelProductPp=new ProductPrePost;
						$modelProductPp->idUser = $ftpAccountEnabled[$i]->idUser;
						$transaction = Yii::app()->db->beginTransaction();
						try{
							if(!$modelProductPp->save())
								throw new CHttpException(404, 'Upload FTP photo: something went wrong while saving the product #'.$i."\n ");
							$idProduct=$modelProductPp->idProduct;
							$stringResult=$stringResult."-----> File: ".$listBlobs[$j]->name." [#".$idProduct."]<br>\n ";
							if(Yii::app()->params['useBlob']){
								$blobData=$blobStorageClient->getBlobData($container, $listBlobs[$j]->name);
								$modelProductPp->addDataToBlob($blobData, $idProduct.'.jpg', 'photos');
								$file=$modelProductPp->getLocalPath('full');
							}else{
								$file = dirname(Yii::app()->request->scriptFile).'/photos/'.$idProduct.'.jpg';
								$blobStorageClient->getBlob($container, $listBlobs[$j]->name, $file);
							}
							//I do not know why I need to reload the model
							$modelProductPp=$this->loadModel($idProduct);
							$modelProductPp->saveUploadedPhoto($file);
							if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
								$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
							}
							//throw new CHttpException(404, "TEST");
							$transaction->commit();
						}
						catch(Exception $e){
							$transaction->rollBack();
							$exception=true;
							$modelProductPp->deleteUploadedPhoto();
							// Delete photo from ftp server
							if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
								$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
							}
							$stringResult=$stringResult.$e->getMessage().'<br>\n ';
							$msg=$msg."[".$listBlobs[$j]->name."] ".$e->getMessage()."<br>";
						}
					}
				}
				if($exception){
					$message = new YiiMailMessage;
					$message->view = 'deletePhotosFromFtp';
					$message->setBody(array('msg'=>$msg, 'username'=>$ftpAccountEnabled[$i]->idUser0->username), 'text/html');
					$message->addTo($ftpAccountEnabled[$i]->idUser0->email);
					$message->setFrom(Yii::app()->params['no-replyEmail'], 'GeoStockPhoto');
					$message->setSubject('FTP transfer error');
					Yii::app()->mail->send($message);
				}
			}
		}
		//echo "###".$countPhotosProcessed."###<br><br>\n ";
		if($countPhotosProcessed>0){
			echo $stringResult;
		}
	}

	// START PANORAMIO FUNC
	public function actionPanoramio($idUserP=null){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
			
		$modelUser=User::model()->findByPk(Yii::app()->user->id);
		if(isset($idUserP)){
			$modelUser->idUserPanoramio=$idUserP;
			if(!$modelUser->save())
			throw new CHttpException(404, 'Panoramio: something went wrong while saving your user ID.');
		}

		$this->render('panoramio', array('modelUser'=>$modelUser));
	}

	public function actionPanoramioRequested(){
		$status=1;
		$error_msg="";
		$success_msg="";

		$transaction = Yii::app()->db->beginTransaction();
		try{
			if(!isset($_POST['User']))
			throw new CHttpException(404, 'Panoramio: something went wrong while reading the form.');
			if(!isset($_POST['User']['idUserPanoramio']))
			throw new CHttpException(404, 'Panoramio: something went wrong while reading your Panoramio ID user.');
			if(!isset($_POST['User']['acceptTermsPanoramio']))
			throw new CHttpException(404, 'Panoramio: something went wrong while reading your acceptance of Terms and Conditions.');
			if($_POST['User']['acceptTermsPanoramio']==0)
			throw new CHttpException(404, 'You must accept the Terms and Conditions');
				
			$modelUser=User::model()->findByPk(Yii::app()->user->id);
			$modelUser->idUserPanoramio=$_POST['User']['idUserPanoramio'];
			if(!$modelUser->save())
			throw new CHttpException(404, 'Panoramio: something went wrong while saving your user ID.');
				
			$testAPI = $this->CallAPI('GET', 'http://www.panoramio.com/map/get_panoramas.php?set='.$modelUser->idUserPanoramio.'&from=0&to=1&minx=-180&miny=-90&maxx=180&maxy=90');
			$testAPI = json_decode($testAPI);
			if(!isset($testAPI->count))
			throw new CHttpException(404, 'Panoramio: something went wrong while reading your photos information from Panoramio.');
			$success_msg="Your request has been saved.<br>".$testAPI->count." photos will be copied on GeoStockPhoto.";

			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			$error_msg=$e->getMessage();
			$status=0;
		}


		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg,
			'success_msg'=>$success_msg
		);
		echo json_encode($arr);
	}

	private function CallAPI($method, $url, $data = false){
		$curl = curl_init();

		switch ($method){
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);

				if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_PUT, 1);
				break;
			default:
				if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
		}

		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "username:password");

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		return curl_exec($curl);
	}

	public function actionListPanoramioUsers($start=0, $end=100, $mp=6, $minPhotos=30){
		$stringResult="";

		for($i=$start; $i<$end; $i++){
			$resAPI = $this->CallAPI('GET', 'http://www.panoramio.com/map/get_panoramas.php?set='.$i.'&from=0&to=100&minx=-180&miny=-90&maxx=180&maxy=90&size=original');
			$resAPI = json_decode($resAPI);
			if(isset($resAPI->count)){
				if($resAPI->photos>30){
					$cntOK=0;
					for($k=0; $k<count($resAPI->photos); $k++){
						if(($resAPI->photos[$k]->width*$resAPI->photos[$k]->height)>($mp*1000000))
						$cntOK++;
						if($cntOK==$minPhotos)
						break;
					}
					if($cntOK>=30){
						$url="http://www.panoramio.com/user/".$i;
						$stringResult=$stringResult."<a href='".$url."'>".$i." [".count($resAPI->photos)."]</a> ";
						$stringResult=$stringResult."<a href='".CController::createUrl('photo/msgPanoramio', array('idPanoramio'=>$i, 'lang'=>"it"))."'>[IT]</a> ";
						$stringResult=$stringResult."<a href='".CController::createUrl('photo/msgPanoramio', array('idPanoramio'=>$i))."'>[EN]</a><br>\n";
					}
				}
			}
		}
		if(isset($stringResult))
		echo $stringResult;
	}

	public function actionCountPanoramioUserPhotos($idUser, $mp=6){
		$stringResult="";
		for($j=0; $j<3; $j++){
			$resAPI = $this->CallAPI('GET', 'http://www.panoramio.com/map/get_panoramas.php?set='.$idUser.'&from='.($j*500).'&to='.((($j+1)*500)-1).'&minx=-180&miny=-90&maxx=180&maxy=90&size=original');
			$resAPI = json_decode($resAPI);
			if(isset($resAPI->count)){
				$cntOK=0;
				for($k=0; $k<count($resAPI->photos); $k++){
					if(($resAPI->photos[$k]->width*$resAPI->photos[$k]->height)>($mp*1000000))
					$cntOK++;
				}
				$stringResult=$stringResult."<a href='http://www.panoramio.com/user/".$idUser."'>".$idUser." [".$cntOK."/".count($resAPI->photos)."]</a><br>\n";
			}
		}
			
		if(isset($stringResult))
		echo $stringResult;
	}

	public function actionCronJobPanoramio(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUserPanoramio is not NULL and enablePanoramio=1';
		$dataUser=User::model()->findAll($criteria);
		$stringResult="";
		$cntOK=0;

		for($i=0; $i<count($dataUser); $i++){
			//$stringResult=$stringResult."Panoramio to GSP for ".$dataUser[$i]->username."<br>\n";
			for($j=0; $j<3; $j++){
				$resAPI = $this->CallAPI('GET', 'http://www.panoramio.com/map/get_panoramas.php?set='.$dataUser[$i]->idUserPanoramio.'&from='.($j*500).'&to='.((($j+1)*500)-1).'&minx=-180&miny=-90&maxx=180&maxy=90&size=original');
				$resAPI = json_decode($resAPI);
				echo "Total files: ".count($resAPI->photos)."<br>";
				if(!isset($resAPI->count))
					throw new CHttpException(404, 'Panoramio: something went wrong while reading your photos information from Panoramio.');
				for($k=0; $k<count($resAPI->photos); $k++){
					$stringResult=$stringResult.$k." - ";
					$fileSaved=false;
					$transaction = Yii::app()->db->beginTransaction();
					try{
						if(($resAPI->photos[$k]->width*$resAPI->photos[$k]->height)<4000000)
							throw new CHttpException(404, 'Panoramio: photo id '.$resAPI->photos[$k]->photo_id.' is less than 4M pixel');
						$criteria=new CDbCriteria;
						$criteria->condition='idPanoramio='.$resAPI->photos[$k]->photo_id;
						if(ProductPrePost::model()->Exists($criteria))
							throw new CHttpException(404, 'Panoramio: photo id '.$resAPI->photos[$k]->photo_id.' already copied');
						$modelProductPp=new ProductPrePost;
						$modelProductPp->idUser = $dataUser[$i]->idUser;
						$modelProductPp->title=substr($resAPI->photos[$k]->photo_title, 0, 64);
						$modelProductPp->idPanoramio=$resAPI->photos[$k]->photo_id;
						if(isset($dataUser[$i]->youDoNothing))
							$modelProductPp->idProductStatus=8; // PrePending (in attesa delle categorie)
						if(!$modelProductPp->save()){
							$error_msg="";
							$errors = $modelProductPp->getErrors();
							foreach($errors as $err){
								$error_msg=$error_msg.'<li>'.$err[0].'</li>';
							}
							throw new CHttpException(404, $error_msg);
							//throw new CHttpException(404, 'Panoramio CronJob: something went wrong while saving the product #'.$k);
						}
						$idProduct=$modelProductPp->idProduct;
						$dataPhoto = file_get_contents($resAPI->photos[$k]->photo_file_url);
						if($dataPhoto==false)
							throw new CHttpException(404, 'Panoramio CronJob: something went wrong while reading the file #'.$k);
						if(Yii::app()->params['useBlob']){
							$modelProductPp->addDataToBlob($dataPhoto, $idProduct.'.jpg', 'photos');
							$file=$modelProductPp->getLocalPath('full');
						}else{
							$file = dirname(Yii::app()->request->scriptFile).'/photos/'.$idProduct.'.jpg';
							file_put_contents($file, $dataPhoto);
						}
						$fileSaved=true;
						//I do not know why I need to reload the model
						$modelProductPp=$this->loadModel($idProduct);
						$modelProductPp->saveUploadedPhoto($file);
						$modelProductPp->photoPrePost->lat=$resAPI->photos[$k]->latitude;
						$modelProductPp->photoPrePost->lng=$resAPI->photos[$k]->longitude;
						if(!$modelProductPp->photoPrePost->save())
							throw new CHttpException(404, 'Panoramio CronJob: something went wrong while saving the photo #'.$k);
						$transaction->commit();
						//$transaction->rollBack();
						$stringResult=$stringResult."[user: ".$dataUser[$i]->username."] http://www.geostockphoto.com/photo/download/id/".$modelProductPp->idProduct."/sizePx/430 <br>\n";
						$cntOK++;
						if($cntOK==3)
							break 2;
					}
					catch(Exception $e){
						if(isset($modelProductPp))
							if($fileSaved)
								$modelProductPp->deleteUploadedPhoto();
						$transaction->rollBack();
						$stringResult=$stringResult.$e->getMessage()."<br>\n ";
					}
				}
			}
		}
		if(isset($stringResult))
			echo $stringResult;
	}

	public function actionMsgPanoramio($idPanoramio, $lang="en"){
		$name="";
		$codeRef=md5("ref_user_".$idPanoramio);
		$url="http://www.panoramio.com/user/".$idPanoramio;
		$html=file_get_contents($url);
		//echo $html;
		preg_match("/Photos by (?P<name>\w+)/", $html, $name);
		if($lang=="it")
		$this->render('msgPanoramioIt', array('name'=>$name['name'], 'idPanoramio'=>$idPanoramio, 'codeRef'=>$codeRef));
		else
		$this->render('msgPanoramioEn', array('name'=>$name['name'], 'idPanoramio'=>$idPanoramio, 'codeRef'=>$codeRef));
	}
	// END PANORAMIO FUNC

	public function actionCronJobFtpEditorFiles2(){
		$now=time();
		$countPhotosProcessed=0;
		$photosProcessedLimit=intval(ConfParameters::model()->findByPk("ProcessedFtpFilesLimit")->value);
		$stringResult="START CronJob FTP files Action<br><br>\n\n ";
		$blobStorageClient=$this->createFtpBlobClient();

		$criteria=new CDbCriteria;
		$criteria->condition='idUser=1'; //Prendo l'account ftp del super-gsp user
		$ftpAccountSuper=FtpAccount::model()->find($criteria);

		$container=$ftpAccountSuper->username;
		if($blobStorageClient->containerExists($container)){
			$listBlobs=$blobStorageClient->listBlobs($container);
			echo count($listBlobs);
			for($j=0; $j<count($listBlobs); $j++){
				echo "TEST";
				//Verifico la proprietà della foto
				$idUser=explode('/', $listBlobs[$j]->name, 2);
				if($idUser[1]!='placeholder.txt'){
					echo "###".$listBlobs[$j]->lastModified."###<br>\n ";
					$lastModified=$listBlobs[$j]->lastModified."#";
					$lastModified=substr($lastModified, 5, 21);
					$lastModified=strtotime($lastModified);
						
					if(($now-$lastModified)>600){ //10min
						$countPhotosProcessed++;
						if($countPhotosProcessed>$photosProcessedLimit){
							$stringResult=$stringResult.'There are other files to be processed!';
							break 1; //Esci dal ciclo for
						}
						$idUser=(int)$idUser[0];
						$modelProductPp=new ProductPrePost;
						$modelProductPp->idUser = $idUser;
						$modelProductPp->idProductStatus=8;
						$transaction = Yii::app()->db->beginTransaction();
						try{
							if(!$modelProductPp->save())
							throw new CHttpException(404, 'Upload FTP photo: something went wrong while saving the product #'.$i."\n ");
							$idProduct=$modelProductPp->idProduct;
							$stringResult=$stringResult."-----> File: ".$listBlobs[$j]->name." [#".$idProduct."]<br>\n ";
							/*if(Yii::app()->params['useBlob']){
								$blobData=$blobStorageClient->getBlobData($container, $listBlobs[$j]->name);
								$modelProductPp->addDataToBlob($blobData, $idProduct.'.jpg', 'photos');
								$file=$modelProductPp->getLocalPath('full');
								}else{
								$file = dirname(Yii::app()->request->scriptFile).'/photos/'.$idProduct.'.jpg';
								$blobStorageClient->getBlob($container, $listBlobs[$j]->name, $file);
								}
								//I do not know why I need to reload the model
								$modelProductPp=$this->loadModel($idProduct);
								$modelProductPp->saveUploadedPhoto($file);
								if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
								$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
								}*/
							throw new CHttpException(404, "TEST");
							$transaction->commit();
						}
						catch(Exception $e){
							$transaction->rollBack();
							//$modelProductPp->deleteUploadedPhoto();
							// Delete photo from ftp server
							// if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator'])
							//$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
							$stringResult=$stringResult.$e->getMessage().'<br>\n ';
						}
					}
				}
			}
		}
		//echo "###".$countPhotosProcessed."###<br><br>\n ";
		if($countPhotosProcessed>0){
			echo $stringResult;
		}
	}

	public function actionCronJobFtpEditorFiles(){
		$now=time();
		$countPhotosProcessed=0;
		$photosProcessedLimit=intval(ConfParameters::model()->findByPk("ProcessedFtpFilesLimit")->value);
		$stringResult="START CronJob FTP files Action<br><br>\n\n ";
		$blobStorageClient=$this->createFtpBlobClient();

		$criteria=new CDbCriteria;
		$criteria->condition='idUser=1'; //Prendo l'account ftp del super-gsp user
		$ftpAccountSuper=FtpAccount::model()->find($criteria);

		$container=$ftpAccountSuper->username;
		if($blobStorageClient->containerExists($container)){
			$listBlobs=$blobStorageClient->listBlobs($container);
			for($j=0; $j<count($listBlobs); $j++){
				//Verifico la proprietà della foto
				$idUser=explode('/', $listBlobs[$j]->name, 2);
				if($idUser[1]!='placeholder.txt'){
					echo "###".$listBlobs[$j]->lastModified."###<br>\n ";
					$lastModified=$listBlobs[$j]->lastModified."#";
					$lastModified=substr($lastModified, 5, 21);
					$lastModified=strtotime($lastModified);
						
					if(($now-$lastModified)>600){ //10min
						$countPhotosProcessed++;
						if($countPhotosProcessed>$photosProcessedLimit){
							$stringResult=$stringResult.'There are other files to be processed!';
							break 1; //Esci dal ciclo for
						}
						$idUser=(int)$idUser[0];
						$modelProductPp=new ProductPrePost;
						$modelProductPp->idUser = $idUser;
						$modelProductPp->idProductStatus=8;
						$transaction = Yii::app()->db->beginTransaction();
						try{
							if(!$modelProductPp->save())
							throw new CHttpException(404, 'Upload FTP photo: something went wrong while saving the product #'.$i."\n ");
							$idProduct=$modelProductPp->idProduct;
							$stringResult=$stringResult."-----> File: ".$listBlobs[$j]->name." [#".$idProduct."]<br>\n ";
							if(Yii::app()->params['useBlob']){
								$blobData=$blobStorageClient->getBlobData($container, $listBlobs[$j]->name);
								$modelProductPp->addDataToBlob($blobData, $idProduct.'.jpg', 'photos');
								$file=$modelProductPp->getLocalPath('full');
							}else{
								$file = dirname(Yii::app()->request->scriptFile).'/photos/'.$idProduct.'.jpg';
								$blobStorageClient->getBlob($container, $listBlobs[$j]->name, $file);
							}
							//I do not know why I need to reload the model
							$modelProductPp=$this->loadModel($idProduct);
							$modelProductPp->saveUploadedPhoto($file);
							if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
								$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
							}
							//throw new CHttpException(404, "TEST");
							$transaction->commit();
						}
						catch(Exception $e){
							$transaction->rollBack();
							$modelProductPp->deleteUploadedPhoto();
							// Delete photo from ftp server
							// if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator'])
							//$blobStorageClient->deleteBlob($container, $listBlobs[$j]->name);
							$stringResult=$stringResult.$e->getMessage().'<br>\n ';
						}
					}
				}
			}
		}
		//echo "###".$countPhotosProcessed."###<br><br>\n ";
		if($countPhotosProcessed>0){
			echo $stringResult;
		}
	}

	public function actionFtpRequest(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id;
		if(FtpAccount::model()->exists($criteria))
			throw new CHttpException(404, 'FTP request: you already have an ftp account.');
		$criteria->condition='idUser is null and enable=1';
		$freeFTPaccount=FtpAccount::model()->findAll($criteria);
		if(count($freeFTPaccount)==0)
			throw new CHttpException(404, 'FTP request: there are no more FTP accounts available.');
		if(!shuffle($freeFTPaccount))
			throw new CHttpException(404, 'FTP request: something went wrong while reading your FTP account.');
		$freeFTPaccount[0]->idUser=Yii::app()->user->id;
		if(!$freeFTPaccount[0]->save())
			throw new CHttpException(404, 'FTP request: something went wrong while saving your FTP account information.');

		$this->renderpartial('_viewFtpAccount',array(
			'username'=>$freeFTPaccount[0]->username,		
			'password'=>$freeFTPaccount[0]->password,	
		));
	}

	public function actionUpload(){
		$items=new UploadedPhoto;

		$transaction = Yii::app()->db->beginTransaction();
		try{
			if(!isset($_POST['UploadedPhoto']))
			throw new CHttpException(404, 'Upload photo: something went wrong while uploading the file.');

			for ($i=1;$i<=10;$i++){
				if(!isset($_POST['UploadedPhoto']['image'.$i]))
					throw new CHttpException(404, 'Upload photo: something went wrong while uploading the file #'.$i);
				if($img = CUploadedFile::getInstance($items,'image'.$i)){
					if($img->size>=30000000)
						throw new CHttpException(404, 'Upload photo: Size of the photo must be less than 30MB [#'.$i.']');
					Yii::app()->controller->saveUploadedPhoto($img->tempName);
				}
			}
			$transaction->commit();
			$this->redirect(array('submit', 'displayUploadSuccess'=>''));
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
			$this->redirect(array('submit', 'displayUploadError'=>''));
		}
	}

	public function saveUploadedPhoto($tempFilename){
		$modelProductPp=new ProductPrePost;
		$modelProductPp->idUser = Yii::app()->user->id;
		try{
			if(!$modelProductPp->save())
				throw new CHttpException(404, 'Upload photo: something went wrong while saving the product #'.$i);
			if(!Yii::app()->params['useBlob']){
				$file=$modelProductPp->getLocalPath('full');
				if(!move_uploaded_file($tempFilename, $file))
					throw new CHttpException(404, 'Upload photo: something went wrong while saving the file #'.$modelProductPp->idProduct);
				$type=CFileHelper::getExtension($file);
				if($type!='jpeg' && $type!='jpg')
					throw new CHttpException(404, 'Upload photo: Type error of the photo [#'.$i.']');
			}else{
				$modelProductPp->addToBlob($tempFilename, $modelProductPp->idProduct.'.jpg', 'photos');
				$file=$tempFilename;
			}
			//I do not know why I need to reload the model
			$modelProductPp=$this->loadModel($modelProductPp->idProduct);
			$modelProductPp->saveUploadedPhoto($file);
		}
		catch(Exception $e){
			$modelProductPp->deleteUploadedPhoto();
			throw $e;
		}
	}

	public function actionXUpload(){
		if(!isset($_FILES['file']['tmp_name']))
		throw new CHttpException(404, 'Upload photo: something went wrong while uploading the file.');
		$transaction = Yii::app()->db->beginTransaction();
		try{
			Yii::app()->controller->saveUploadedPhoto($_FILES['file']['tmp_name']);
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
	}

	// Credo debba essere eseguito da un cronjob per evitare conflitti nell'assegnazione
	public function actionReservePhotoToEditors(){
		$criteria=new CDbCriteria;
		$criteria->condition='idRole=1 or idRole=2';
		$dataOwnSwitchUser=OwnSwitchUser::model()->findAll($criteria);

		for($i=0; $i<count($dataOwnSwitchUser); $i++){
			$criteria->condition='idUserMaster='.$dataOwnSwitchUser[$i]->idUserMaster;
			$criteria->with['idProduct0']['condition']='idProductStatus=8 and idUser='.$dataOwnSwitchUser[$i]->idUserSlave;
			$count=MasterAction::model()->count($criteria);
			$diff=50-$count;
			if($diff>0){
				$criteria=new CDbCriteria;
				$notExists=" and NOT EXISTS (select * from tbl_master_action b where t.idProduct=b.idProduct)";
				$criteria->condition='idUser='.$dataOwnSwitchUser[$i]->idUserSlave.' and idProductStatus=8'.$notExists;
				$criteria->limit=$diff;
				$dataProductPp=ProductPrePost::model()->findAll($criteria);
				for($j=0; $j<count($dataProductPp); $j++){
					$modelMasterAction=new MasterAction;
					$modelMasterAction->idUserMaster=$dataOwnSwitchUser[$i]->idUserMaster;
					$modelMasterAction->idProduct=$dataProductPp[$j]->idProduct;
					if(!$modelMasterAction->save())
					throw new CHttpException(404, 'Something went wrong while saving a Master Action.');
					else
					echo "Photo #".$dataProductPp[$j]->idProduct." reserved to user #".$dataOwnSwitchUser[$i]->idUserMaster."<br>\n ";
				}
			}
		}
	}

	public function actionSubmit($display="", $id=null){
		$checkEditor=false;
		if(isset($id) && $this->checkEditor($id)!=0)
		$checkEditor=true;
		elseif(isset($id) && !$this->checkEditor($id))
		throw new CHttpException(404, 'Submit photo: you are not authorized to view this page.');
			
		$displaySubmitSuccess="none";
		$displayUploadSuccess="none";
		$displayUploadError="none";
		switch ($display) {
			case 'submitSuccess':
				$displaySubmitSuccess="";
				break;
			case 'uploadSuccess':
				$displayUploadSuccess="";
				break;
			case 'uploadError':
				$displayUploadError="";
		}

		/*$criteria=new CDbCriteria;
		 $criteria->condition='idUserSlave='.Yii::app()->user->id;
		 if(OwnSwitchUser::model()->exists($criteria) && !isset(Yii::app()->session['idUserMaster']))
			throw new CHttpException(404, 'Photo Upload: your account has been limited because we are working on it.<br>
			It will be fully reactivated as soon as we have done with our work.<br>Thank you for your patiance!');*/

		$this->layout='//layouts/operative';
		$items=new UploadedPhoto;

		$criteria=new CDbCriteria;
		if(!$checkEditor){
			$criteria->condition='idProductStatus=:idProductStatus AND idUser=:idUser';
			$criteria->params=array(':idProductStatus'=>1, ':idUser'=>Yii::app()->user->id);
		}else{
			$criteria->condition='idUser='.$id.' and idProductStatus=8';
			$criteria->together=true;
			$criteria->with['masterAction0']['condition']='idUserMaster='.Yii::app()->user->id;
		}
		$dataProviderProductPp = new CActiveDataProvider('ProductPrePost', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>50)
		));
		$data=$dataProviderProductPp->getData();
		$count=count($data);

		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster=:idUserMaster';
		$criteria->params=array(':idUserMaster'=>Yii::app()->user->id);
		$dataOwnSwitchUser = OwnSwitchUser::model()->findAll($criteria);

		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id;
		$ftpAccount=FtpAccount::model()->find($criteria);

		if($count>0){
			$firstElement=$data[0]->idProduct;
			$modelProductPp=$this->loadModel($firstElement);

			$selectedPhoto=new SelectedPhoto;
			$selectedPhoto->selection[1]=$firstElement;
			$selectedPhoto->count=$count;
			$selectedPhoto_all=new SelectedPhoto;
			for($i=0; $i<$count; $i++)
			$selectedPhoto_all->selection[$i+1]=$data[$i]->idProduct;
			$selectedPhoto_all->count=$count;

			$criteria=new CDbCriteria;
			$criteria->condition='idPhotoType=1';
			$criteria->order='name ASC';
			$categories=ConfCategory::model()->findAll($criteria);
			//$criteria->condition='idPhotoType=2';
			//$categoriesBN=ConfCategory::model()->findAll($criteria);

			//$photoType=ConfPhotoType::model()->findAll();

			if(isset($data[0]->photoPrePost) && isset($data[0]->photoPrePost)){
				$lat=$data[0]->photoPrePost->lat;
				$lng=$data[0]->photoPrePost->lng;
				if($lat=="" || $lng==""){
					$lat="null";
					$lng="null";
				}
			}else{
				$lat="null";
				$lng="null";
			}
			Yii::app()->controller->onloadFunctions="initializeMapSmall($lat, $lng)";


			/*$timeWindow=ConfParameters::model()->findByPk("TimeTakenBNphoto");
				$minTime = time() - floatval($timeWindow->value);
				echo $minTime=Yii::app()->dateFormatter->format(
				'yyyy-MM-dd HH:mm:ss',
				$minTime
				).'  --  ';
				$maxTime = time() + floatval($timeWindow->value); //PuÃ² essere anche futura perchÃ¨ il time() Ã¨ calcolato con il fuso orario del server
				echo $maxTime=Yii::app()->dateFormatter->format(
				'yyyy-MM-dd HH:mm:ss',
				$maxTime
				).'  --  ';
				echo $shootingDate=str_replace ( '.000' , '' , $data[0]->photoPrePost->shootingDate ).'  --  ';
				if($shootingDate<$minTime || $shootingDate>$maxTime)
				echo "ERR";
				else
				echo "OK";*/


		}else{
			$categories=null;
			$photoType=null;
			$categoriesBN=null;
			$selectedPhoto=null;
			$selectedPhoto_all=null;
			$modelProductPp=null;
		}

		$this->render('submit',array(
			'firstModel'=>$modelProductPp,
			'items'=>$items,
			'dataProvider'=>$dataProviderProductPp,
			'categories'=>$categories,
		//'categoriesBN'=>$categoriesBN,
		//'photoType'=>$photoType,
			'selectedPhoto'=>$selectedPhoto,
			'selectedPhoto_all'=>$selectedPhoto_all,
			'ftpAccount'=>$ftpAccount,
			'displaySubmitSuccess'=>$displaySubmitSuccess,
			'displayUploadSuccess'=>$displayUploadSuccess,
			'displayUploadError'=>$displayUploadError,
			'dataOwnSwitchUser'=>$dataOwnSwitchUser,
			'id'=>$id,
		));
	}

	// Ritorna 1 se le due foto sono totalmente diverse, altrimenti 0 (vale solo per details=false)
	private function checkDifferences(&$model1, $img, $count_img, $details=true){
		$totalDiff=1;
		$model2=$this->loadModel($img);
		if($count_img!=0){ //if this is not the first image selected
			if($model1->title!=$model2->title){
				$model1->title="";
			}else{
				$totalDiff=0;
			}
			if($model1->photoPrePost->lat!=$model2->photoPrePost->lat || $model1->photoPrePost->lng!=$model2->photoPrePost->lng){
				$model1->photoPrePost->lat="";
				$model1->photoPrePost->lng="";
			}else{
				$totalDiff=0;
			}
			if($model1->photoPrePost->idCategory1!=$model2->photoPrePost->idCategory1){
				$model1->photoPrePost->idCategory1="";
			}else{
				$totalDiff=0;
			}
				
			if($details){
				if($model1->photoPrePost->idPhotoType!=$model2->photoPrePost->idPhotoType)
				$model1->photoPrePost->idPhotoType="";
				if($model1->photoPrePost->maxSize>$model2->photoPrePost->maxSize)
				$model1->photoPrePost->maxSize=$model2->photoPrePost->maxSize;
				if($model1->description!=$model2->description)
				$model1->description="";
				if($model1->photoPrePost->idCategory2!=$model2->photoPrePost->idCategory2)
				$model1->photoPrePost->idCategory2="";
				if($model1->photoPrePost->shootingDate!=$model2->photoPrePost->shootingDate)
				$model1->photoPrePost->shootingDate="";
					

				if($model1->shoppingPhotoType->licenseType!=$model2->shoppingPhotoType->licenseType){
					$model1->shoppingPhotoType->licenseType="diff";
				}
				if($model1->keywordsCSV!=$model2->keywordsCSV){
					$model1->editKeywords="diff";
				}
				if($model1->shoppingPhotoType->shoppingOptPhotos!="diff"){
					$shoppingOptPhoto1=$model1->shoppingPhotoType->shoppingOptPhotos;
					$shoppingOptPhoto2=$model2->shoppingPhotoType->shoppingOptPhotos;
					if(count($shoppingOptPhoto1)!=count($shoppingOptPhoto2))
					$model1->shoppingPhotoType->shoppingOptPhotos="diff";
					else{
						for($i=0; $i<count($shoppingOptPhoto2); $i++){
							if($shoppingOptPhoto1[$i]->idSize!=$shoppingOptPhoto2[$i]->idSize)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
							else if($shoppingOptPhoto1[$i]->idLicense!=$shoppingOptPhoto2[$i]->idLicense)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
							else if($shoppingOptPhoto1[$i]->price!=$shoppingOptPhoto2[$i]->price)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
						}
					}
				}
				if($model1->shoppingPhotoType->shoppingOptPhotosRm!="diff"){
					$shoppingOptPhotoRm1=$model1->shoppingPhotoType->shoppingOptPhotosRm;
					$shoppingOptPhotoRm2=$model2->shoppingPhotoType->shoppingOptPhotosRm;
					if(count($shoppingOptPhotoRm1)!=count($shoppingOptPhotoRm2))
					$model1->shoppingPhotoType->shoppingOptPhotosRm="diff";
					else{
						for($i=0; $i<count($shoppingOptPhotoRm2); $i++){
							if($shoppingOptPhotoRm1[$i]->idSize!=$shoppingOptPhotoRm2[$i]->idSize)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
							else if($shoppingOptPhotoRm1[$i]->idRMdetails!=$shoppingOptPhotoRm2[$i]->idRMdetails)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
							else if($shoppingOptPhotoRm1[$i]->price!=$shoppingOptPhotoRm2[$i]->price)
							$model1->shoppingPhotoType->shoppingOptPhotos="diff";
							else if($shoppingOptPhotoRm1[$i]->idDuration!=$shoppingOptPhotoRm2[$i]->idDuration)
							$model1->shoppingPhotoType->idDuration="diff";
						}
					}
				}
			}
		}else{ //if this is the first image selected
			$model1=$model2; //just set all fields with the model
			$totalDiff=0;
		}

		return $totalDiff;
	}

	public function actionEditSelectionJson(){
		$selectionJSON=$_POST['selectionJSON'];
		$count=$_POST['count'];

		$selectedPhoto=new SelectedPhoto;
		$selectedPhoto->selection = json_decode($selectionJSON, true);
		$selectedPhoto->count = $count;

		$count_img=0;
		$totalDiff=0;
		$modelProductPp=new ProductPrePost;
		for($i=1;$i<=$count;$i++){
			$idProduct=$selectedPhoto->selection[$i];
			if($idProduct!="" && $idProduct!=null){
				if($totalDiff==0)
				$totalDiff=Yii::app()->controller->checkDifferences($modelProductPp, $idProduct, $count_img, false);
				$count_img++;
			}
		}
			
		if($count_img>0){
			$arr = array(
				'cnt_img_selected'=>$count_img,
				'model'=>array(
					'title'=>$modelProductPp->title,
					'idCategory1'=>$modelProductPp->photoPrePost->idCategory1,
			//'shootingDate'=>$modelProductPp->photoPrePost->shootingDate,
					'lat'=>$modelProductPp->photoPrePost->lat,
					'lng'=>$modelProductPp->photoPrePost->lng,
			)
			);
			echo json_encode($arr);
		}
	}

	private function approvePhoto($idProduct, $nvotes=0, $averageRate=5, $idProductStatus=3, $idReviewer=null){
		$modelProductPp=$this->loadModel($idProduct);
		if($modelProductPp->idProductStatus==2){ // SE E' IN PENDING REVIEW
			$modelProductPp->idProductStatus=$idProductStatus;
			if(!$modelProductPp->save())
				throw new CHttpException(404,'CRON JOB approve photo: something went wrong while updating the status of the product #'.$idProduct);
			$modelProductPp->photoPrePost->nVotes = $nvotes;
			$modelProductPp->photoPrePost->rate = $averageRate;
			if(!$modelProductPp->photoPrePost->save())
				throw new CHttpException(404,'CRON JOB approve photo: something went wrong while saving the photo #'.$idProduct);
				
			if($idProductStatus==3){
				$modelProduct = new Product;
				$modelProduct->attributes = $modelProductPp->attributes;
				if(!$modelProduct->save())
					throw new CHttpException(404,'CRON JOB approve photo: something went wrong while saving the product #'.$idProduct);

				$modelPhoto = new Photo;
				$modelPhoto->attributes = $modelProductPp->photoPrePost->attributes;
				if(isset($idReviewer)){
					$modelPhoto->idReviewer=$idReviewer;
				}
				if(!$modelPhoto->save())
					throw new CHttpException(404,'CRON JOB approve photo: something went wrong while saving the photo #'.$idProduct);
			}
		}
	}

	//Ritorna l'idUserMaster oppure 0 se l'utente loggato non è un editor
	private function checkEditor($idUserSlave, $idProduct=null){
		/*if(isset(Yii::app()->session['idUserMaster'])){
			return Yii::app()->session['idUserMaster'];
			}else*/
		if(Yii::app()->user->isRoleEditor($idUserSlave) || Yii::app()->user->isRoleAdmin($idUserSlave)){
			$check=true;
			if($idProduct!=null){
				$criteria=new CDbCriteria;
				$criteria->condition='idUserMaster='.Yii::app()->user->id.' and idProduct='.$idProduct;
				$criteria->with['idProduct0']['condition']='idProductStatus=8 and idUser='.$idUserSlave;
				if(!MasterAction::model()->exists($criteria))
				$check=false;
			}
			if($check)
			return Yii::app()->user->id;
		}
		return 0;
	}

	private function loadMasterAction($idProduct, $idUserSlave){
		$idUserMaster=$this->checkEditor($idUserSlave, $idProduct);
		if($idUserMaster==0)
		return null;

		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster='.$idUserMaster.' and idProduct='.$idProduct;
		$model=MasterAction::model()->find($criteria);
		if($model==null){
			$model = new MasterAction;
			$model->idUserMaster=$idUserMaster;
			$model->idProduct=$idProduct;
		}
		return $model;
	}

	private function savePhoto($img, $submit=false, $details=false, $submitted=false){
		if(!isset($_POST['PhotoPrePost']) || !isset($_POST['ProductPrePost']))
			throw new CHttpException(404, 'Save photo: something went wrong while reading the information of the photo #'.$img);

		$modelProductPp=$this->loadModel($img);

		$modelMasterAction = $this->loadMasterAction($img, $modelProductPp->idUser);
		if(isset($modelMasterAction))
			$details=false;

		if($modelProductPp->idUser!=Yii::app()->user->id && !isset($modelMasterAction))
			throw new CHttpException(404, 'Save photo: the photo #'.$img.' is not yours.');

		if(!isset($_POST['ProductPrePost']['title']))
			throw new CHttpException(404, 'Save photo: something went wrong while reading the title of the photo #'.$img);
		if(!isset($_POST['PhotoPrePost']['lat']))
			throw new CHttpException(404, 'Save photo: something went wrong while reading the latitude of the photo #'.$img);
		if(!isset($_POST['PhotoPrePost']['lng']))
			throw new CHttpException(404, 'Save photo: something went wrong while reading the longitude of the photo #'.$img);
		//if(!isset($_POST['PhotoPrePost']['idPhotoType']))
		//throw new CHttpException(404, 'Save photo: something went wrong while reading the type of the photo #'.$img);
			
		if($_POST['ProductPrePost']['title']!=""){
			if(isset($modelMasterAction)){
				if($_POST['ProductPrePost']['title']!=$modelProductPp->title)
				$modelMasterAction->title=$_POST['ProductPrePost']['title'];
			}
			$modelProductPp->title=$_POST['ProductPrePost']['title'];
		}
			
		if($_POST['PhotoPrePost']['lat']=="invalid"){
			$modelProductPp->photoPrePost->lat="";
			$modelProductPp->photoPrePost->lng="";
		}elseif($_POST['PhotoPrePost']['lat']!="" && $_POST['PhotoPrePost']['lng']!=""){
			if(isset($modelMasterAction)){
				if($_POST['PhotoPrePost']['lat']!=$modelProductPp->photoPrePost->lat && $_POST['PhotoPrePost']['lng']!=$modelProductPp->photoPrePost->lng){
					$modelMasterAction->lat=$_POST['PhotoPrePost']['lat'];
					$modelMasterAction->lng=$_POST['PhotoPrePost']['lng'];
				}
			}
			$modelProductPp->photoPrePost->lat=$_POST['PhotoPrePost']['lat'];
			$modelProductPp->photoPrePost->lng=$_POST['PhotoPrePost']['lng'];
		}
			
		//if($_POST['PhotoPrePost']['idPhotoType']!="")
		//$modelProductPp->photoPrePost->idPhotoType=$_POST['PhotoPrePost']['idPhotoType'];
			
		if($details){
			if(!isset($_POST['ProductPrePost']['description']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the description of the photo #'.$img);
			if(!isset($_POST['ProductPrePost']['keywordsCSV']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the keywords of the photo #'.$img);
			if(!isset($_POST['ShoppingPhotoType']['licenseType']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the license type of the photo #'.$img);
				
			// Non sarà un dettaglio quando ci saranno anche le BN
			if($_POST['PhotoPrePost']['shootingDate']!=""){
				$parse=CDateTimeParser::parse(
				$_POST['PhotoPrePost']['shootingDate'],
					'dd/MM/yyyy HH:mm:ss'
					);
					if($parse){
						$modelProductPp->photoPrePost->shootingDate=Yii::app()->dateFormatter->format(
						'yyyy-MM-dd HH:mm:ss',
						$parse
						).'.000';
					}
			}

			if($_POST['ProductPrePost']['description']!="")
				$modelProductPp->description=$_POST['ProductPrePost']['description'];
			if($_POST['ProductPrePost']['keywordsCSV']!="")
				$keywordsArray=str_getcsv($_POST['ProductPrePost']['keywordsCSV'], ';');
			if($_POST['ShoppingPhotoType']['licenseType']!=""){
				$modelProductPp->shoppingPhotoType->idProduct = $img;
				$modelProductPp->shoppingPhotoType->licenseType = $_POST['ShoppingPhotoType']['licenseType'];
			}
		}

		// LETTURA TYPE AND CATEGORIES
		if($modelProductPp->photoPrePost->idPhotoType==2){
			if(!isset($_POST['PhotoPrePost']['idCategory1BN']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the first category of the photo #'.$img);
			if($_POST['PhotoPrePost']['idCategory1BN']!="")
				$modelProductPp->photoPrePost->idCategory1=$_POST['PhotoPrePost']['idCategory1BN'];

			if($details){
				if(!isset($_POST['PhotoPrePost']['idCategory2BN']))
					throw new CHttpException(404, 'Save photo: something went wrong while reading the second category of the photo #'.$img);
				if($_POST['PhotoPrePost']['idCategory2BN']!="")
					$modelProductPp->photoPrePost->idCategory2=$_POST['PhotoPrePost']['idCategory2BN'];
			}
		}else if($modelProductPp->photoPrePost->idPhotoType==1){
			if(!isset($_POST['PhotoPrePost']['idCategory1']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the first category of the photo #'.$img);
			if($_POST['PhotoPrePost']['idCategory1']!=""){
				if(isset($modelMasterAction)){
					if($_POST['PhotoPrePost']['idCategory1']!=$modelProductPp->photoPrePost->idCategory1)
					$modelMasterAction->idCategory1=$_POST['PhotoPrePost']['idCategory1'];
				}
				$modelProductPp->photoPrePost->idCategory1=$_POST['PhotoPrePost']['idCategory1'];
			}

			if($details){
				if(!isset($_POST['PhotoPrePost']['idCategory2']))
					throw new CHttpException(404, 'Save photo: something went wrong while reading the second category of the photo #'.$img);
				if($_POST['PhotoPrePost']['idCategory2']!="")
					$modelProductPp->photoPrePost->idCategory2=$_POST['PhotoPrePost']['idCategory2'];
			}
		}else
		throw new CHttpException(404, 'Save photo: something went wrong while reading the type of the photo #'.$img);
		// FINE LETTURA TYPE AND CATEGORIES

		// In caso il salvataggio venga fatto per il submit
		$inTime=true;
		if($submit){
			// Se l'utente è membro di un gruppo con revisore allora metto in idGroup della tbl_photo_pre_post l'id del gruppo revisore
			if(isset($modelProductPp->idUser0->userGroups)){
				$cntGroup=count($modelProductPp->idUser0->userGroups);
				for($i=0; $i<$cntGroup; $i++){
					if(isset($modelProductPp->idUser0->userGroups[$i]->group->idReviewer)){
						$modelProductPp->photoPrePost->idGroup=$modelProductPp->idUser0->userGroups[$i]->group->idGroup;
					}
				}
			}
			$modelProductPp->idProductStatus='5'; //PENDING SUBMIT
			$modelProductPp_test = new ProductPrePost('submit');
			$modelProductPp_test->attributes = $modelProductPp->attributes;
			$modelProductPp->photoPrePost->histogram=Yii::app()->controller->getHistogram($modelProductPp->idProduct);
			if($modelProductPp->photoPrePost->idPhotoType==1)
				$modelPhotoPp_test = new PhotoPrePost('submit');
			else if($modelProductPp->photoPrePost->idPhotoType==2){ // Se è BN
				$modelPhotoPp_test = new PhotoPrePost('submitBN');

				$timeWindow=ConfParameters::model()->findByPk("TimeTakenBNphoto");
				$minTime = time() - floatval($timeWindow->value);
				$minTime=Yii::app()->dateFormatter->format(
					'yyyy-MM-dd HH:mm:ss',
					$minTime
				);
				$maxTime = time() + floatval($timeWindow->value); //Può essere anche futura perchÃ¨ il time() Ã¨ calcolato con il fuso orario del server
				$maxTime=Yii::app()->dateFormatter->format(
					'yyyy-MM-dd HH:mm:ss',
				$maxTime
				);
				$shootingDate=str_replace ( '.000' , '' , $modelProductPp->photoPrePost->shootingDate );
				if($shootingDate<$minTime || $shootingDate>$maxTime)
					$inTime=false;
			}
			$modelPhotoPp_test->attributes = $modelProductPp->photoPrePost->attributes;
		}elseif($submitted){ // In caso si stia salvando una foto già approvata
			$modelProductPp_test=$modelProductPp;
			$modelPhotoPp_test=$modelProductPp->photoPrePost;
			$submit=true;
			$inTime=true;
		}

		if($modelProductPp->validate() && $modelProductPp->photoPrePost->validate()){
			if(!$submit || $modelProductPp_test->validate() && $modelPhotoPp_test->validate() && $inTime && $_POST['ProductPrePost']['termsAccepted']){
				if(!$modelProductPp->save())
					throw new CHttpException(404, 'Save photo: something went wrong while saving the product #'.$img);
				if(!$modelProductPp->photoPrePost->save())
					throw new CHttpException(404, 'Save photo: something went wrong while saving the photo #'.$img);
				if($details){
					if(isset($keywordsArray)){
						if($modelProductPp->saveKeywords($keywordsArray)!=0){
							throw new CHttpException(404, 'Save photo: something went wrong while saving the keywords of the photo #'.$img);
						}
					}
					if(!$modelProductPp->shoppingPhotoType->save())
						throw new CHttpException(404, 'Save photo: something went wrong while saving the type of the photo #'.$img);
					if($modelProductPp->shoppingPhotoType->licenseType=='RF'){
						$err_msg=Yii::app()->controller->saveShoppingOptPhotoRf($img);
						if($modelProductPp->shoppingPhotoType->shoppingOptPhotos==null)
							$err_msg=$err_msg.'<li>At least one sale option must be selected.</li>';
						if($err_msg!="")
							throw new CHttpException(404, $err_msg);
					}else if($modelProductPp->shoppingPhotoType->licenseType=='RM'){
						$err_msg=Yii::app()->controller->saveShoppingOptPhotoRm($img);
						if($modelProductPp->shoppingPhotoType->shoppingOptPhotosRm==null)
							$err_msg=$err_msg.'<li>At least one sale option must be selected.</li>';
						if($err_msg!="")
							throw new CHttpException(404, $err_msg);
					}
					if($submit)
						if($modelProductPp->cleanShoppingOptPhoto()!=0)
							throw new CHttpException(404, 'Save photo: something went wrong while cleaning the shopping options of the photo #'.$img);
				}
				if($submitted){
					$modelProductPp->product->title=$modelProductPp->title;
					$modelProductPp->product->description=$modelProductPp->description;
					if(!$modelProductPp->product->save())
						throw new CHttpException(404, 'Save photo: something went wrong while saving the product #'.$img);
					$modelProductPp->product->photo->idCategory1=$modelProductPp->photoPrePost->idCategory1;
					$modelProductPp->product->photo->idCategory2=$modelProductPp->photoPrePost->idCategory2;
					$modelProductPp->product->photo->lat=$modelProductPp->photoPrePost->lat;
					$modelProductPp->product->photo->lng=$modelProductPp->photoPrePost->lng;
					$modelProductPp->product->photo->shootingDate=$modelProductPp->photoPrePost->shootingDate;
					if(!$modelProductPp->product->photo->save())
						throw new CHttpException(404, 'Save photo: something went wrong while saving the product #'.$img);
				}
				// Save Master Action
				if(isset($modelMasterAction)){
					if(!$modelMasterAction->save()){
						throw new CHttpException(404, 'Something went wrong while saving the information of your editing.');
					}
				}
			}else{
				if(isset($modelMasterAction)){
					$errorValidation='';
					if(!$_POST['ProductPrePost']['termsAccepted'])
					$errorValidation='You must accept the Terms&Conditions.';
					if($_POST['PhotoPrePost']['idCategory1']=='')
					$errorValidation=$errorValidation.'<br>You must insert the category at least.';
					if($errorValidation!='')
					throw new CHttpException(404, $errorValidation);

					$modelProductPp->idProductStatus=1;
					if(!$modelProductPp->save())
					throw new CHttpException(404, 'Something went wrong while saving the information of the photo.');
					if(!$modelProductPp->photoPrePost->save())
					throw new CHttpException(404, 'Save photo: something went wrong while saving the photo #'.$img);
					if(!$modelMasterAction->save()){
						throw new CHttpException(404, 'Something went wrong while saving the information of your editing.');
					}
				}else{
					$error_msg="<ul>";
					$errors = $modelProductPp_test->getErrors();
					foreach($errors as $err){
						$error_msg=$error_msg.'<li>'.$err[0].'</li>';
					}
					$errors = $modelPhotoPp_test->getErrors();
					foreach($errors as $err){
						$error_msg=$error_msg.'<li>'.$err[0].'</li>';
					}
					/*if(!$inTime){
						if($error_msg!="")
						$error_msg=$error_msg."<br>";
						$error_msg=$error_msg.'A BN photo must be taken within 24 hours.';
						}*/
						
					if(!$_POST['ProductPrePost']['termsAccepted']){
						$error_msg=$error_msg.'<li>You must accept the Terms&Conditions.</li>';
					}
					$error_msg=$error_msg.'</ul>';

					throw new CHttpException(404, $error_msg);
				}
			}
		}else{
			$error_msg="";
			$errors = $modelProductPp->getErrors();
			foreach($errors as $err){
				if($error_msg!="")
				$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}
			$errors = $modelProductPp->photoPrePost->getErrors();
			foreach($errors as $err){
				if($error_msg!="")
				$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}

			throw new CHttpException(404, $error_msg);
		}
	}

	private function saveShoppingOptPhotoRf($img){
		if(isset($_POST['ShoppingOptPhoto'])){
			ShoppingOptPhoto::model()->deleteAll('idProduct='.$img);
			//$shoppingOpt=array_unique($_POST['ShoppingOptPhoto']);
			foreach($_POST['ShoppingOptPhoto'] as $selectedItem){
				if(!isset($selectedItem['idSize']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option size of the photo #'.$img);
				if(!isset($selectedItem['idLicense']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option license of the photo #'.$img);
				if(!isset($selectedItem['price2dec']))
				throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option price of the photo #'.$img);
				$shoppingOptPhoto = new ShoppingOptPhoto;
				$shoppingOptPhoto->idProduct = $img;
				$shoppingOptPhoto->idSize=$selectedItem['idSize'];
				$shoppingOptPhoto->idLicense=$selectedItem['idLicense'];
				$shoppingOptPhoto->price=$selectedItem['price2dec'];
				if($shoppingOptPhoto->validate()){
					if(!$shoppingOptPhoto->save())
					throw new CHttpException(404, 'Save photo: something went wrong while saving the shopping options of the photo #'.$img);
				}else{
					$error_msg="";
					$errors = $shoppingOptPhoto->getErrors();
					foreach($errors as $err){
						if($error_msg!="")
						$error_msg=$error_msg."<br>";
						$error_msg=$error_msg.$err[0];
					}
					return $error_msg;
				}
			}
		}
	}

	private function saveShoppingOptPhotoRm($img){
		if(isset($_POST['ShoppingOptPhotoRm'])){
			ShoppingOptPhotoRm::model()->deleteAll('idProduct='.$img);
			//$shoppingOpt=array_unique($_POST['ShoppingOptPhotoRm']);
			foreach($_POST['ShoppingOptPhotoRm'] as $key=>$selectedItem){
				//if(!isset($selectedItem['idSize']))
					//throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option size of the photo #'.$img);
				//if(!isset($selectedItem['idDuration']))
					//throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option duration of the photo #'.$img);
				if(!isset($selectedItem['price2dec']))
					throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option price of the photo #'.$img);
				$shoppingOptPhotoRm = new ShoppingOptPhotoRm;
				$shoppingOptPhotoRm->idProduct = $img;
				$shoppingOptPhotoRm->idSize=0;//$selectedItem['idSize'];
				foreach($_POST['ConfLicenseRmDetails'][$key] as $selectedDetails){
					if(!isset($selectedDetails['idRMdetails']))
					throw new CHttpException(404, 'Save photo: something went wrong while reading the shopping option details of the photo #'.$img);
					if($selectedDetails['idRMdetails']!='')
					$shoppingOptPhotoRm->idRMdetails=$selectedDetails['idRMdetails'];
				}
				$shoppingOptPhotoRm->idDuration=1;//$selectedItem['idDuration'];
				$shoppingOptPhotoRm->price=$selectedItem['price2dec'];
				if($shoppingOptPhotoRm->validate()){
					if(!$shoppingOptPhotoRm->save())
					throw new CHttpException(404, 'Save photo: something went wrong while saving the shopping options of the photo #'.$img);
				}else{
					$error_msg="";
					$errors = $shoppingOptPhotoRm->getErrors();
					foreach($errors as $err){
						if($error_msg!="")
						$error_msg=$error_msg."<br>";
						$error_msg=$error_msg.$err[0];
					}
					return $error_msg;
				}
			}
		}
	}

	private function savePendingPhoto($idProduct){
		$modelProductPp=$this->loadModel($idProduct);
		if($modelProductPp->idUser!=Yii::app()->user->id)
		throw new CHttpException(404, $idProduct.' is not your photo.');
		if($modelProductPp->idProductStatus!=5)
		throw new CHttpException(404, $idProduct.' is not in Pending Submit status.');
		if(!$_POST['ProductPrePost']['termsAccepted']){
			throw new CHttpException(404, 'You must accept the Terms&Conditions.');
		}
		$modelProductPp->idProductStatus=2;
		if(!$modelProductPp->save())
		throw new CHttpException(404, 'Something went wrong while saving the status of the photo.');
	}

	public function actionAjaxSave($details=false, $submitted=false, $pendingSubmit=false){
		if(!isset($_POST['SelectedPhoto']['count']))
		throw new CHttpException(404, 'Save photo: something went wrong while retrieving the number of photos to be saved.');
		$status=1;
		$error_msg="";
		for($i=1; $i<=$_POST['SelectedPhoto']['count']; $i++){
			if(isset($_POST['SelectedPhoto']['selection'][$i])){
				$img=$_POST['SelectedPhoto']['selection'][$i];
				if($img!=""){
					$transaction = Yii::app()->db->beginTransaction();
					try{
						if($pendingSubmit)
						Yii::app()->controller->savePendingPhoto($img);
						else
						Yii::app()->controller->savePhoto($img, null, $details, $submitted);
						$transaction->commit();
					}catch(Exception $e){
						$transaction->rollBack();
						$status=0;
						$error_msg=$e->getMessage();
					}
				}
			}else{
				throw new CHttpException(404, 'Save photo: something went wrong while saving the '.$i.'&deg photo.');
			}
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}

	public function actionDeleteSinglePhoto($idProduct){
		$transaction = Yii::app()->db->beginTransaction();
		try{
			$modelProductPp=$this->loadModel($idProduct);
			if($modelProductPp->remove()!=0)
			throw new CHttpException(404, 'Delete photo: something went wrong during the process.');
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
		if(isset(Yii::app()->request->urlReferrer)){
			// se sono dentro la view della foto non devo tornarci
			if(Yii::app()->request->urlReferrer!=$this->createAbsoluteUrl('photo/view',array('id'=>$idProduct))){
				$this->redirect(Yii::app()->request->urlReferrer);
			}else{
				$this->redirect(array('photo/index'));
			}
		}else
		$this->redirect(array('photo/index'));
	}

	public function actionDeleteMultiplePhoto(){
		//$status=1;
		//$error_msg="";
		if(isset($_POST['SelectedPhoto']['count'])){
			for($i=1; $i<=$_POST['SelectedPhoto']['count']; $i++){
				if(isset($_POST['SelectedPhoto']['selection']))
					$selectionPost=$_POST['SelectedPhoto']['selection'];
				else if(isset($_POST['SelectedPhoto']['selection_del']))
					$selectionPost=$_POST['SelectedPhoto']['selection_del'];
			
				if(isset($selectionPost[$i])){
					$img=$selectionPost[$i];
					if($img!="" && $img!=null){
						$transaction = Yii::app()->db->beginTransaction();
						try{
							$modelProductPp=$this->loadModel($img);
							if($modelProductPp->remove()==0)
							$transaction->commit();
							else
							throw new CHttpException(404, 'Delete photo: something went wrong during the process.');
						}catch(Exception $e){
							$transaction->rollBack();
							//$status=0;
							//$error_msg=$e->getMessage();
							throw $e;
						}
					}
				}else{
					throw new CHttpException(404, 'Delete photo: something went wrong while deleting the '.$i.'&deg photo.');
				}
			}
		}else{
			throw new CHttpException(404, 'Delete photo: something went wrong while retrieving the number of photos to be deleted.');
		}
		$this->redirect(array('photo/submit'));
			
		/*$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
			);
			echo json_encode($arr);*/
	}

	private function checkEditPhotoReq($id){
		$modelProductPp=$this->loadModel($id);
		if(!isset($modelProductPp->idProductStatus))
		throw new CHttpException(404,'Photo view: something went wrong while retrieving the status of the photo #'.$id);
		if(Yii::app()->user->isRoleAdmin($modelProductPp->idUser))
		return $modelProductPp;
		//if($modelProductPp->idProductStatus=='1')
		//throw new CHttpException(404,'Photo #'.$id.' has not been submitted yet.');
		if($modelProductPp->idProductStatus=='5' | $modelProductPp->idProductStatus=='2')
		throw new CHttpException(404,'Photo #'.$id.' is still waiting for review.');
		if($modelProductPp->idProductStatus=='4')
		throw new CHttpException(404,'Photo #'.$id.' has been rejected.');
		if($modelProductPp->idProductStatus=='6')
		throw new CHttpException(404,'Photo #'.$id.' has been deleted.');
		if($modelProductPp->idProductStatus=='7')
		throw new CHttpException(404,'Someone has reported an abuse on photo #'.$id);
		return $modelProductPp;
	}

	public function actionEdit($idProduct=null){
		$this->layout='//layouts/operative';

		// *************************************************************
		// PHOTO TYPE AND CATEGORIES
		$photoType=ConfPhotoType::model()->findAll();
		$criteria=new CDbCriteria;
		$criteria->condition='idPhotoType=1';
		$categories=ConfCategory::model()->findAll($criteria);
		$criteria->condition='idPhotoType=2';
		$categoriesBN=ConfCategory::model()->findAll($criteria);
		// END PHOTO TYPE AND CATEGORIES
		// *************************************************************


		// *************************************************************
		// SELECTED PHOTO
		$modelProductPp=new ProductPrePost;
		$selectedPhoto= new SelectedPhoto;
		$pending=true;
		if($idProduct!=null){
			$selectedPhoto->selection[1]=$idProduct;
			$modelProductPp=Yii::app()->controller->checkEditPhotoReq($idProduct);
			if($modelProductPp->idUser!=Yii::app()->user->id && $this->checkEditor($modelProductPp->idUser)==0 && Yii::app()->user->isAdministrator())
				throw new CHttpException(404, 'Edit photo: the photo #'.$idProduct.' is not yours.');
			$selectedPhoto->fileName[1]=$modelProductPp->getUrl(120);
			$selectedPhoto->count=1;
			if($modelProductPp->idProductStatus!=1)
				$pending=false;
		}else{
			if(isset($_POST['SelectedPhoto']['count'])){
				$count_img=0;
				$totalDiff=0;
				for($i=1; $i<=$_POST['SelectedPhoto']['count']; $i++){
					if(isset($_POST['SelectedPhoto']['selection'][$i])){
						$img=$_POST['SelectedPhoto']['selection'][$i];
						if($img!="" && $img!=null){
							Yii::app()->controller->checkEditPhotoReq($img);
							if($totalDiff==0)
							$totalDiff=Yii::app()->controller->checkDifferences($modelProductPp, $img, $count_img);
							$count_img++;
							$selectedPhoto->selection[$count_img]=$img;
							$newModel=$this->loadModel($img);
							if($newModel->idUser!=Yii::app()->user->id && $this->checkEditor($modelProductPp->idUser)==0)
								throw new CHttpException(404, 'Edit photo: the photo #'.$img.' is not yours.');
							$selectedPhoto->fileName[$count_img]=$newModel->getUrl(120);
						}
					}else{
						throw new CHttpException(404, 'Edit photo: something went wrong while retrieving information of the '.$i.'&deg photo.');
					}
				}
				$selectedPhoto->count = $count_img;
			}else{
				throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the number of selected photos.');
			}
		}
		// END SELECTED PHOTO
		// *************************************************************


		// *************************************************************
		// SHOPPING OPTIONS MANAGER
		$shoppingOptMan=new ShoppingOptManager();
		if(isset($modelProductPp->shoppingPhotoType->shoppingOptPhotos)){
			if($modelProductPp->shoppingPhotoType->shoppingOptPhotos!="diff"){
				for($i=0; $i<count($modelProductPp->shoppingPhotoType->shoppingOptPhotos); $i++){
					$shoppingOptMan->putItems($modelProductPp->shoppingPhotoType->shoppingOptPhotos[$i]);
				}
			}
		}else{
			throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RF.');
		}

		$shoppingOptManRm=new ShoppingOptManager();
		$shoppingOptManRm->setClass('ShoppingOptPhotoRm');
		if(isset($modelProductPp->shoppingPhotoType->shoppingOptPhotosRm)){
			if($modelProductPp->shoppingPhotoType->shoppingOptPhotosRm!="diff"){
				for($i=0; $i<count($modelProductPp->shoppingPhotoType->shoppingOptPhotosRm); $i++){
					$shoppingOptManRm->putItems($modelProductPp->shoppingPhotoType->shoppingOptPhotosRm[$i]);
				}
			}
		}else{
			throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RM.');
		}
		// END SHOPPING OPTIONS MANAGER
		// *************************************************************

		$lat=$modelProductPp->photoPrePost->lat;
		$lng=$modelProductPp->photoPrePost->lng;
		if($lat=="" || $lng==""){
			$lat="null";
			$lng="null";
		}

		if((Yii::app()->controller->onloadFunctions="initializeMapSmall($lat, $lng, 1)")!=0)
		throw new CHttpException(404,'Edit photo: something went wrong while loading the map.');
			
		$this->render('edit',array(
			'selectedPhoto'=>$selectedPhoto,
			'modelProductPp'=>$modelProductPp,
			'categories'=>$categories,
			'photoType'=>$photoType,
			'categoriesBN'=>$categoriesBN,
            'shoppingOptMan'=>$shoppingOptMan,
            'shoppingOptManRm'=>$shoppingOptManRm,
			'pending'=>$pending
		));
	}

	public function actionPendingSubmit(){
		$this->layout='//layouts/operative';

		// *************************************************************
		// SELECTED PHOTO
		$modelProductPp=new ProductPrePost;
		$selectedPhoto= new SelectedPhoto;

		$criteria=new CDbCriteria;
		$criteria->condition='idProductStatus=:idProductStatus AND idUser=:idUser';
		$criteria->params=array(':idProductStatus'=>5, ':idUser'=>Yii::app()->user->id);
		$criteria->limit=100;
		$data=ProductPrePost::model()->findAll($criteria);
		$count=count($data);

		$selectedPhoto=new SelectedPhoto;
		$selectedPhoto_all=new SelectedPhoto;
		if($count>0){
			$firstElement=$data[0]->idProduct;
			$modelProductPp=$this->loadModel($firstElement);

			$selectedPhoto->selection[1]=$firstElement;
			$selectedPhoto->count=$count;
			for($i=0; $i<$count; $i++){
				$selectedPhoto_all->fileName[$i+1]=$data[$i]->getUrl(120);
				$selectedPhoto_all->selection[$i+1]=$data[$i]->idProduct;
				//$selectedPhoto->selection[$i+1]=$img;
			}
			$selectedPhoto_all->count=$count;
		}else{
			$selectedPhoto_all->count=0;
		}
		// END SELECTED PHOTO
		// *************************************************************

		$this->render('pendingSubmit',array(
			'selectedPhoto'=>$selectedPhoto,
			'selectedPhoto_all'=>$selectedPhoto_all,
			'modelProductPp'=>$modelProductPp,
		));
	}

	public function actionAutoCompleteKeyword(){
		Util::processParamsJsonAutocomplete('Dictionary', 'keyword', 'and fromUser=0');
	}

	private function getHistogram($idProduct){
		$modelProductPp=$this->loadModel($idProduct);
		$src=$modelProductPp->getLocalPath('430');
		$im = ImageCreateFromJpeg($src);

		$imgw = imagesx($im);
		$imgh = imagesy($im);

		// n = total number or pixels
		$n = $imgw*$imgh;

		//$histo = array();
		for($index=0; $index<=255; $index++){
			$histo[$index]=0;
			//$histoRed[$index]=0;
		}

		for ($i=0; $i<$imgw; $i++){
			for ($j=0; $j<$imgh; $j++){
				// get the rgb value for current pixel
				$rgb = ImageColorAt($im, $i, $j);

				// extract each value for r, g, b
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;

				// get the Value from the RGB value
				//$V = round(($r + $g + $b) / 3);
				$V = round($r*0.3 + $g*0.6 + $b*0.1);

				// add the point to the histogram
				$histo[$V] ++;//= (1/$n);
				//$histoRed[$r] ++;//= (1/$n);
			}
		}
		$json="";
		//$jsonRed="";
		for ($index=0; $index<=255; $index++){
			$h = intval($histo[$index]*10000);
			//$hRed = intval($histoRed[$index]*10000);
			if($index!=0){
				$json = $json.",";
				//$jsonRed = $jsonRed.",";
			}
			$json = $json."\"".$index."\":".$h;
			//$jsonRed = $jsonRed."\"".$index."\":".$hRed;
		}

		if(Yii::app()->params['useBlob']){
			if(file_exists($src))
			unlink($src);
		}

		return "{\"RGB\":[{".$json."}]}";
	}

	public function actionCrop($idProduct, $x, $y){
		$width_crop=256;
		$modelProductPp=$this->loadModel($idProduct);
		$sizes=$modelProductPp->photoPrePost->sizes;
		if($modelProductPp->photoPrePost->ratio>=1){
			$x_large=$x/430*$sizes['w'];
			$y_large=$y/(430/$modelProductPp->photoPrePost->ratio)*$sizes['h'];
		}else{
			$y_large=$y/430*$sizes['h'];
			$x_large=$x/(430*$modelProductPp->photoPrePost->ratio)*$sizes['w'];
		}

		$file=$modelProductPp->getLocalPath('full');
		$tmb=Yii::app()->imagemod->load($file);

		if(!isset($tmb))
		throw new CHttpException(404,'Crop Photo: something went wrong while loading the file #'.$idProduct);
		$w_crop=max(intval($x_large-$width_crop/2), 0);
		$h_crop=max(intval($y_large-$width_crop/2), 0);
		$w_crop=min($w_crop, $sizes['w']-$width_crop);
		$h_crop=min($h_crop, $sizes['h']-$width_crop);
		$tmb->image_crop = $h_crop.'px '.($sizes['w']-$w_crop-$width_crop).'px '.($sizes['h']-$h_crop-$width_crop).'px '.$w_crop.'px';
		$tmb->file_new_name_body = md5($tmb->file_src_name);
		header('Content-type: '.$tmb->file_src_mime);
		echo $tmb->process();
		//$tmb->process('./crop');
		if(!$tmb->processed)
		throw new CHttpException(404,'Crop Photo: '.$tmb->error.' [#'.$idProduct.']');
		if(Yii::app()->params['useBlob'])
		$tmb->clean();
	}

	public function actionCronJobSubmit($idProduct=null){
		if($idProduct==null){
			$criteria=new CDbCriteria;
			$criteria->condition='idProductStatus=5';
			$modelProductPp=ProductPrePost::model()->findAll($criteria);
		}else{
			$criteria=new CDbCriteria;
			$criteria->condition='idProduct='.$idProduct.' and idProductStatus=5';
			$modelProductPp=ProductPrePost::model()->findAll($criteria);
		}

		for($i=0; $i<count($modelProductPp); $i++){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				/*SALVATAGGIO THUMB 430px spostato in UPLOAD*/
				$modelUser=User::model()->findByPk($modelProductPp[$i]->idUser);
				if($modelUser->idUserProfile==5) // Se e' un Power allora va direttamente in vendita
				Yii::app()->controller->approvePhoto($modelProductPp[$i]->idProduct);
				else{
					$modelProductPp[$i]->idProductStatus=2;
					if(!$modelProductPp[$i]->save())
						throw new CHttpException(404,'Cron Job Submit: something went wrong while saving the photo #'.$modelProductPp[$i]->idProduct);
				}
				$transaction->commit();
			}catch(Exception $e){
				$transaction->rollBack();
				throw $e;
			}
		}
	}

	public function actionSubmitted($details=false){
		$status=1;
		$error_msg='';

		if(!isset($_POST['SelectedPhoto']['count']))
		throw new CHttpException(404, 'Submit photo: something went wrong while reading the number of the photos.');
		$paid=true;
		for($count=1; $count<=$_POST['SelectedPhoto']['count']; $count++){
			if($paid){
				$img=$_POST['SelectedPhoto']['selection'][$count];
				if($img!=""){
					$paid=false;
					//Checking the bonus and credits of the user
					$submitCostValue=floatval(ConfParameters::model()->findByPk("SubmitCost")->value);
					$modelUser=User::model()->findByPk(Yii::app()->user->id);
					$submitBonus=$modelUser->submitBonus;
					if($submitBonus<0){
						$paid=true;
					}else if($submitBonus >= $submitCostValue){
						$modelUser->submitBonus -= $submitCostValue;
						$paid=true;
					}else{
						$creditCostValue=floatval(ConfParameters::model()->findByPk("CreditCost")->value);
						$paid=$modelUser->pay($creditCostValue);
					}
					if($paid){
						$transaction = Yii::app()->db->beginTransaction();
						try{
							Yii::app()->controller->savePhoto($img, "submit", $details);
							if(!$modelUser->save())
							throw new CHttpException(404,'Photo upload: something went wrong while saving the photo #'.$img);
							$transaction->commit();
						}catch(Exception $e){
							$transaction->rollBack();
							$error_msg=$e->getMessage();
							$status=0;
						}
						// DA SOSTITUIRE CON UN CRONJOB SE NECESSARIO (eg spostandoci dentro la creazione dei thumb)
						$modelProductPp=$this->loadModel($img);
						if($this->checkEditor($modelProductPp->idUser)==0){
							$modelProductPp=$this->loadModel($img);
							$this->actionCronJobSubmit($modelProductPp->idProduct);
						}
					}
				}
			}
		}

		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);

		//$this->redirect(array('photo/submit'));
	}

	public function actionStatus($state="waiting_review"){
		if($state=="waiting_review")
		$idProductStatus=2;
		elseif($state=="approved")
		$idProductStatus=3;
		elseif($state=="rejected")
		$idProductStatus=4;
		elseif($state=="deleted")
		$idProductStatus=6;
	  
		$criteria=new CDbCriteria;
		$criteria->condition='idProductStatus=:idProductStatus AND idUser=:idUser';
		$criteria->params=array(':idProductStatus'=>$idProductStatus, ':idUser'=>Yii::app()->user->id);
		$dataProviderProductPp = new CActiveDataProvider('ProductPrePost', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));

		$this->list_view($dataProviderProductPp, $idProductStatus);
	}

	public function actionPurchased(){
		$criteria=new CDbCriteria;
		$criteria->with['idTransaction0']->condition="idUser=".Yii::app()->user->id;
		$criteria->order="insert_timestamp DESC";
		$dataTransactionPhoto = new CActiveDataProvider('TransactionPhoto', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));
		
		$data=$dataTransactionPhoto->getData();
		if(count($data)>0){
			$idProduct = $data[0]->idProduct;
			$idTransactionPhoto = $data[0]->idTransactionPhoto;
			$lat=$data[0]->idProduct0->photoPrePost->lat;
			$lng=$data[0]->idProduct0->photoPrePost->lng;
			Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, null, true)";
		}else{
			$idProduct=null;
			$idTransactionPhoto=null;
		}
		
		$timeWindow=ConfParameters::model()->findByPk("TimeWindowPhotoDownload");
		$timeWindow = time() - floatval($timeWindow->value); // 2 weeks before
		$timeWindow = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss', $timeWindow).'.000';
		
		$this->render('_list_view_purchased',array(
			'firstIdProduct'=>$idProduct,
			'firstIdTransactionPhoto'=>$idTransactionPhoto,
			'dataProvider'=>$dataTransactionPhoto,
			'timeWindow'=>$timeWindow
		));
	}

	private function list_view($dataProviderProductPp, $idProductStatus=null){
		$data=$dataProviderProductPp->getData();

		if(count($data)>0){
			$idProduct = $data[0]->idProduct;
			$lat=$data[0]->photoPrePost->lat;
			$lng=$data[0]->photoPrePost->lng;
			Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, null, true)";
		}else{
			$idProduct=null;
		}
		
		$this->render('_list_view',array(
			'firstIdProduct'=>$idProduct,
			'dataProvider'=>$dataProviderProductPp,
			'idProductStatus'=>$idProductStatus
		));
	}

	public function actionDownload($id, $idSize=null, $licenseType="RF", $sizePx=null, $admin=0){
		$checkTransaction=false;
		if(Yii::app()->user->isAdministrator() && $admin){
			$modelProductPp=$this->loadModel($id);
		}else{
			$modelProductPp=$this->loadModel($id);
			if($idSize!=0) // If it is not an original size
				$sizePx = ConfSize::model()->findByPk($idSize)->maxSize;
			/*$modelProductPp=$transaction[0]->idProduct0;
			if($licenseType=='RM')
				$sizePx = $transaction[0]->transactionPhotoRms[0]->idSize0->maxSize;
			else if($licenseType=='RF')
				$sizePx = $transaction[0]->transactionPhotoRfs[0]->idSize0->maxSize;*/
			//throw new CHttpException(404, 'TEST');

			// Verifico se sono autorizzato a scaricare la foto
			$timeWindow=ConfParameters::model()->findByPk("TimeWindowPhotoDownload");
			$timeWindow = time() - floatval($timeWindow->value); // 2 weeks before
			$timeWindow = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss', $timeWindow).'.000';
			$criteria=new CDbCriteria;
			$criteria->condition='t.idProduct=:idProduct AND t.insert_timestamp>=:insert_timestamp';
			$criteria->params=array(':idProduct'=>$id, ':insert_timestamp'=>$timeWindow);
			$criteria->with['idTransaction0']['condition']='idTransaction0.idUser='.Yii::app()->user->id;
			if($licenseType=='RM')
				$criteria->with['transactionPhotoRms']['condition']='transactionPhotoRms.idSize='.$idSize;
			else if($licenseType=='RF')
				$criteria->with['transactionPhotoRfs']['condition']='transactionPhotoRfs.idSize='.$idSize;
			$transaction=TransactionPhoto::model()->findAll($criteria);
			if(count($transaction)>0)
				$checkTransaction=true;
		}

		if($checkTransaction || (Yii::app()->user->isAdministrator() && $admin)){
			$path=$modelProductPp->getLocalPath('full');
			$img = Yii::app()->imagemod->load($path);

			if(!isset($img))
				throw new CHttpException(404, 'Download photo: something went wrong while loading the photo #'.$id);
			if($idSize!=0){ // If it is not an original size
				$img->image_resize = true;
				$img->image_ratio = true;
				$img->image_x = $sizePx;
				$img->image_y = $sizePx;
			}
			$img->file_new_name_body = md5($img->file_src_name);
			header('Content-type: '.$img->file_src_mime);
			echo $img->process();
			if(!$img->processed)
				throw new CHttpException(404,'Download upload: '.$img->error.' [#'.$id.']');
				
			if(Yii::app()->params['useBlob']){
				if(file_exists($path)){
					$img->clean();
				}
			}
		}else
			throw new CHttpException(404, 'Download photo: you cannot download the photo #'.$id);
	}

	private function distance($lat1, $lon1, $lat2, $lon2, $unit){
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}

	public function actionVote(){
		$criteria=new CDbCriteria;
		$criteria->condition='idReviewer='.Yii::app()->user->id;
		$modelConfGroups=ConfGroups::model()->find($criteria);
		if(count($modelConfGroups)!=0){
			$criteria=new CDbCriteria;
			//$criteria->condition='idProductStatus=2 AND idUser!='.Yii::app()->user->id;
			$criteria->condition='idProductStatus=2';
			$criteria->with['photoPrePost']['condition']="photoPrePost.idGroup=".$modelConfGroups->idGroup;
			$dataProductPp=ProductPrePost::model()->findAll($criteria);
		}else{
			// Leggo tutte le foto che sono in attesa di revisione
			$criteria=new CDbCriteria;
			$criteria->condition='idProductStatus=2 AND idUser!='.Yii::app()->user->id;
			$criteria->with['photoPrePost']['condition']="photoPrePost.idGroup is null";
			$dataProductPp=ProductPrePost::model()->findAll($criteria);
			if(!shuffle($dataProductPp))
				throw new CHttpException(404, 'Make a review: something went wrong while reading a random photo.');
		}
			
		// Verifico se la somma dei pesi delle reviews e ==1 (prima opzione) oppure >1 (seconda opzione)
		$check=false;
		$check2=false;
		$check3=false;
		for($i=0; $i<count($dataProductPp); $i++){
			$nvotes=count($dataProductPp[$i]->reviews);
			$tot_weight=0;
			$alreadyReviewed=false;
			for($j=0; $j<$nvotes; $j++){
				if($dataProductPp[$i]->reviews[$j]->idUser==Yii::app()->user->id) //check if already reviewd by myself
					$alreadyReviewed=true;
				else if(!$alreadyReviewed)
					$tot_weight = $tot_weight + $dataProductPp[$i]->reviews[$j]->idUser0->voteWeight;
			}
			if($tot_weight<1 && !$alreadyReviewed){
				if($tot_weight==0){ // se non c'è stata ancora nessuna votazione
					$modelProductPp=$dataProductPp[$i];
					$check=true;
					break;
				}else{ // se c'è stata già  almeno una votazione
					$new_tot_weight=$tot_weight+Yii::app()->user->getWeightRW();
					if($new_tot_weight==1){
						$modelProductPp=$dataProductPp[$i];
						$check=true;
						break;
					}else if($new_tot_weight>1 && !$check2){
						$modelProductPp2=$dataProductPp[$i];
						$check2=true;
					}
					// DA ELIMINARE QUANDO  CI SARANNO FOTOGRAFI PROFESSIONISTI
					else if(!$check3){ // Faccio votare più volte anche utenti newbie o utenti generici
						$modelProductPp3=$dataProductPp[$i];
						$check3=true;
					}
				}
			}
		}
		if(!$check && $check2){
			$check=true;
			$modelProductPp=$modelProductPp2;
		}elseif(!$check && $check3){
			$check=true;
			$modelProductPp=$modelProductPp3;
		}/*elseif(!$check){
		// Leggo tutte le foto che sono in attesa di revisione
		// DA ELIMINARE QUANDO SI INSERIRANNO I SUBMIT BONUS
		$criteria=new CDbCriteria;
		$criteria->condition='idProductStatus=3 AND idUser!='.Yii::app()->user->id;
		$dataProductPp=ProductPrePost::model()->findAll($criteria);
		if(!shuffle($dataProductPp))
		throw new CHttpException(404, 'Make a review: something went wrong while reading a random photo.');
		for($i=0; $i<count($dataProductPp); $i++){
		$nvotes=count($dataProductPp[$i]->reviews);
		$alreadyReviewed=false;
		for($j=0; $j<$nvotes; $j++){
		if($dataProductPp[$i]->reviews[$j]->idUser==Yii::app()->user->id) //check if already reviewd by myself
		$alreadyReviewed=true;
		}
		if(!$alreadyReviewed){
		$modelProductPp=$dataProductPp[$i];
		$check=true;
		break;
		}
		}
		}*/

		if($check){
			$lat=$modelProductPp->photoPrePost->lat;
			$lng=$modelProductPp->photoPrePost->lng;
			Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, null, true);
				initializeMapHome($lat, $lng, null, null, 1, 12)";

			$motivations=ConfReviewMotivations::model()->findAll();

			$reviewedPhoto = new Reviews;
			$reviewedPhoto->idProduct = $modelProductPp->idProduct;
				
			$cs=Yii::app()->clientScript;
			$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/rating.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl.'/jsSuapa/jquery.lightbox-0.5.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);

			$this->render('view',array(
				'modelProductPp'=>$modelProductPp,
				'motivations'=>$motivations,
				'reviewedPhoto'=>$reviewedPhoto,
				'vote'=>true
			));
		}else{
			$this->render('view',array(
				'modelProductPp'=>null,
				'vote'=>true
			));
		}
	}

	public function actionReviewed(){
		$status=1;
		$error_msg='';

		if(!isset($_POST['Reviews']))
		throw new CHttpException(404, 'Make a review: something went wrong while reading the review information.');
		if(!isset($_POST['Reviews']['motivationIds']))
		throw new CHttpException(404, 'Make a review: something went wrong while reading the review information.');

		$review = new Reviews;
		$transaction = Yii::app()->db->beginTransaction();
		try{
			$review->idProduct = $_POST['Reviews']['idProduct'];
			$review->idUser = Yii::app()->user->id;
			$review->rate = $_POST['Reviews']['rate'];
			if($review->validate() && ($_POST['Reviews']['checkCrop'] || $_POST['Reviews']['rate']<0) && ($_POST['Reviews']['rate']>0 || is_array($_POST['Reviews']['motivationIds']))){
				if(!$review->save())
				throw new CHttpException(404, 'Make a review: something went wrong while saving the review.');
				if(is_array($_POST['Reviews']['motivationIds'])){
					$idReview=$review->getPrimaryKey();
					foreach($_POST['Reviews']['motivationIds'] as $selectedItem){
						$reviewMotivations = new ReviewMotivations;
						$reviewMotivations->idReview = $idReview;
						$reviewMotivations->idMotivation = $selectedItem;
						if(!$reviewMotivations->save())
						throw new CHttpException(404, 'Make a review: something went wrong while saving the review motivations.');
					}
				}
				$transaction->commit();
			}else{
				$error_msg_int="";
				if($_POST['Reviews']['rate']>0 && !$_POST['Reviews']['checkCrop']){
					if($error_msg_int!="")
					$error_msg_int=$error_msg_int."<br>";
					$error_msg_int=$error_msg_int."You must see at least one crop of the photo.";
				}
				if($_POST['Reviews']['rate']<0 && !is_array($_POST['Reviews']['motivationIds'])){
					if($error_msg_int!="")
					$error_msg_int=$error_msg_int."<br>";
					$error_msg_int=$error_msg_int."If you give a negative vote, you must say what is wrong with it.";
				}
				$errors = $review->getErrors();
				foreach($errors as $err){
					if($error_msg_int!="")
					$error_msg_int=$error_msg_int."<br>";
					$error_msg_int=$error_msg_int.$err[0];
				}

				throw new CHttpException(404, $error_msg_int);
			}
		}
		catch(Exception $e){
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

	public function actionReported(){
		$status=1;
		$error_msg='';

		if(isset($_POST['Ticket'])){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				//Creare Ticket
				$modelTicket = new Ticket('reportAbuse');
				$modelTicket->attributes=$_POST['Ticket'];
				$modelTicket->idTicketType=1; //Repoert Abuse
				$modelTicket->idTicketStatus=1; //Pending
				$modelTicket->sourceActor='APPLICATION';
				$modelTicket->idUser = (isset(Yii::app()->user->id) ? Yii::app()->user->id : null);

				if($modelTicket->validate()){
					if($modelTicket->save()){
						$message = new YiiMailMessage;
						$message->view = 'reportAbuse';
						//userModel is passed to the view
						$message->setBody(array('modelTicket'=>$modelTicket), 'text/html');
						$email=ConfParameters::model()->findByPk("ReportAbuseMailTo");
						$message->addTo($email->value);
						$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
						$message->setSubject('GeoStockPhoto report abuse sent from user #'.$modelTicket->idUser.' for photo #'.$modelTicket->idProduct);
						Yii::app()->mail->send($message);
					}else{
						throw new CHttpException(404, 'Report Abuse: something went wrong while saving the report.');
					}
					$transaction->commit();
				}else{
					$error_validate="<ul>";
					$errors = $modelTicket->getErrors();
					foreach($errors as $err){
						$error_validate=$error_validate.'<li>'.$err[0].'</li>';
					}
					throw new CHttpException(404, $error_validate);
				}
			}
			catch(Exception $e){
				$transaction->rollBack();
				$error_msg=$e->getMessage();
				$status=0;
			}
		}

		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}


	public function actionAcceptReportAbuse($idProduct){
		$transaction = Yii::app()->db->beginTransaction();
		try{
			if(!isset($_POST['Ticket']['messageResponse']))
				throw new CHttpException(404,'Accept Report Abuse: Message Response Form is not setted ');
			
			$messageResponse=$_POST['Ticket']['messageResponse'];

			$modelProductPrePost=ProductPrePost::model()->findByPk((int)$idProduct);
			if($modelProductPrePost===null)
				throw new CHttpException(404,'Accept Report Abuse: The requested product #'.$idProduct.' does not exist.');

			$hasReportAbuse=false;
			if($n=count($modelProductPrePost->ticket))
			for($k=0; $k<$n; $k++){
				if($modelProductPrePost->ticket[$k]->idTicketType==1)
					$hasReportAbuse=true;
			}	

			if($hasReportAbuse){
				if($n=count($modelProductPrePost->ticket))
				for($k=0; $k<$n; $k++){
					if($modelProductPrePost->ticket[$k]->idTicketType==1){
						$modelTicket = $modelProductPrePost->ticket[$k];
						$modelTicket->idTicketStatus=3; //Closed
						$modelTicket->messageResponse=$messageResponse;
						if(!$modelTicket->save())
							throw new CHttpException(404, 'Accept Report Abuse: something went wrong while saving Ticket.');	
					}	
				}		
				if(!$modelProductPrePost->removeForReportAbuse())
							throw new CHttpException(404, 'Accept Report Abuse: something went wrong while removing the product.');								
			}else
				throw new CHttpException(404,'Accept Report Abuse: The requested product #'.$idProduct.' has not report abuse.');

			$transaction->commit();

			
			$message = new YiiMailMessage;
			$message->view = 'reportAbuseUserNotification';
			$message->setBody(array('messageResponse'=>$messageResponse, 'modelProductPrePost'=>$modelProductPrePost), 'text/html');
			$modelUser = User::model()->findByPk((int)$modelProductPrePost->idUser);
			$message->addTo($modelUser->email);
			$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
			$message->setSubject('GeoStockPhoto report abuse sent for your photo for photo #'.$modelProductPrePost->idProduct);
			Yii::app()->mail->send($message);
		}
		catch(Exception $e){
			$transaction->rollBack();
			$error_msg=$e->getMessage();
			echo $error_msg;
		}

		$this->render('reportAbuseResult',array(
				'accepted'=>true,
				'idProduct'=>$modelProductPrePost->idProduct,
		));
	}

	public function actionRejectReportAbuse($idProduct){
		$transaction = Yii::app()->db->beginTransaction();
		
		try{
			$modelProductPrePost=ProductPrePost::model()->findByPk((int)$idProduct);
			if($modelProductPrePost===null)
				throw new CHttpException(404,'Reject Report Abuse: The requested product #'.$idProduct.' does not exist.');

			$hasReportAbuse=false;
			if($n=count($modelProductPrePost->ticket))
			for($k=0; $k<$n; $k++){
				if($modelProductPrePost->ticket[$k]->idTicketType==1)
					$hasReportAbuse=true;
			}	

			if($hasReportAbuse){
				if($n=count($modelProductPrePost->ticket))
				for($k=0; $k<$n; $k++){
					if($modelProductPrePost->ticket[$k]->idTicketType==1){
						$modelTicket = $modelProductPrePost->ticket[$k];
						$modelTicket->idTicketStatus=3; //Closed
						$modelTicket->messageResponse='REPORT ABUSE REJECTED';
						if(!$modelTicket->save())
							throw new CHttpException(404, 'Reject Report Abuse: something went wrong while saving Ticket.');	
					}	
				}		
								
			}else
				throw new CHttpException(404,'Reject Report Abuse: The requested product #'.$idProduct.' has not report abuse.');

			$transaction->commit();
		}
		catch(Exception $e){
			$transaction->rollBack();
			$error_msg=$e->getMessage();
		}

		$this->render('reportAbuseResult',array(
				'accepted'=>false,
				'idProduct'=>$modelProductPrePost->idProduct,
		));	
	}

	public function actionReportAbuse($id){
		$this->layout='//layouts/operative';
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);

		$modelProductPp=$this->loadModel($id);
		if($modelProductPp->idProductStatus!=3 && $modelProductPp->idProductStatus!=2)
		throw new CHttpException(404,'You cannot report a \'not approved\' photo.');
			
		$modelTicket = new Ticket('reportAbuse');
		$modelTicket->idProduct=$id;
		$modelTicket->subject="REPORT ABUSE of #".$id;
		$this->render('reportAbuse',array('modelTicket'=>$modelTicket, 'modelProductPp'=>$modelProductPp));
	}

	public function actionAdmin(){
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
		$model->attributes=$_GET['Photo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=ProductPrePost::model()->findByPk((int)$id);
		if($model===null)
		throw new CHttpException(404,'The requested photo #'.$id.' does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUpdateShootingDate($start, $end){
		for($id=$start; $id<=$end; $id++){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$modelProductPp=$this->loadModel($id);
				if($modelProductPp->idProductStatus!=6){
					$file=$modelProductPp->getLocalPath('full');
					$exif = @exif_read_data($file, 0, true);
						
					if(isset($exif['EXIF']['DateTimeOriginal'])){
						if($exif['EXIF']['DateTimeOriginal']!="" && $exif['EXIF']['DateTimeOriginal']!=0){
							$shootingDate=Yii::app()->dateFormatter->format('yyyy/MM/dd HH:mm:ss', $exif['EXIF']['DateTimeOriginal']);
							$shootingDate=$shootingDate.".000";
						}else
						$shootingDate=null;
					}else{
						$shootingDate=null;
					}
					$modelProductPp->photoPrePost->shootingDate=$shootingDate;
					$modelProductPp->photoPrePost->save();
					if(isset($modelProductPp->product->photo)){
						$modelProductPp->product->photo->shootingDate=$shootingDate;
						$modelProductPp->product->photo->save();
						echo "photo";
					}
					echo "#".$id." OK<br>";
				}
				$transaction->commit();
			}catch(Exception $e){
				$transaction->rollBack();
				echo $e->getMessage().'<br>';
			}
		}
	}

	public function actionLicense($type, $idTransactionPhoto=null){
		$modelTransactionPhoto=TransactionPhoto::model()->findByPk($idTransactionPhoto);
		if(count($modelTransactionPhoto)>0){
			if($modelTransactionPhoto->idTransaction0->idUser!=Yii::app()->user->id)
				throw new CHttpException(404, 'Show License: you are not the buyer of this transaction.');
		}
		$this->render($type, array(
			'modelTransactionPhoto'=>$modelTransactionPhoto
		));
	}
}
