<?php

class Shopping_cartController extends Controller{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $idPhotoType=1;
	public $user;
	public $onloadFunctions;

	/**
	 * @return array action filters
	 */
	public function filters(){
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
				'actions'=>array('buyAPI', 'getShoppingOptions'), 
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'addRemove', 'ajaxSaveOpt', 'buy', 'saveDuration'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
			    'expression'=>'$user->isAdministrator()',
			),*/
			array('deny',  // deny all users
				//'actions'=>array('buy'),
				'users'=>array('*'),
			),
		);
	}
		
	/**
	 * Displays the list of all photos in the shopping cart.
	 */
	public function actionIndex(){
		$this->layout='//layouts/operative';
			
		$modelConfPaypal=ConfPaypal::model()->findByPk(Yii::app()->params['paypalEnv']);	                                                   
		if($modelConfPaypal===null)                                                                          
			throw new CHttpException(404,'Buy credits cart: The Paypal Config is not loaded for env:'.Yii::app()->params['paypalEnv']);
			
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('https://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/shopping_cart/utility.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile($modelConfPaypal->urlJSdigitalGoods, CClientScript::POS_HEAD);	
		
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id;
		$shoppingCart=ShoppingCart::model()->findAll($criteria);
		
		if(count($shoppingCart)>0){
			$lat=$shoppingCart[0]->idProduct0->photoPrePost->lat;
			$lng=$shoppingCart[0]->idProduct0->photoPrePost->lng;
			Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, null, true)";
		}else{
			$shoppingOptPhoto=null;
		}
		
		$modelUser=User::model()->findByPk(Yii::app()->user->id);
		
		$discount=0;
		if(isset($modelUser->ownCoupon)){
			if(!$modelUser->ownCoupon->used){
				$discount=$modelUser->ownCoupon->coupon->discount;
			}
		}
		
		$enableSalesConf=ConfParameters::model()->findByPk("EnableSales")->value;
		$enableSales = $enableSalesConf | $modelUser->enableSales() | Yii::app()->user->isAdministrator();
		
		$nPhotos=0;
		$totPrice=0;
		for($i=0; $i<count($shoppingCart); $i++){
			if(isset($shoppingCart[$i]->rowSelected)){
				$nPhotos++;
				$totPrice+=($shoppingCart[$i]->optSel['price']);
			}
		}
		if($discount>0){
			$totPriceToBuy=$totPrice*(1-$discount);
		}else{
			$totPriceToBuy=$totPrice;
		}
		$creditsToBuy=max($totPriceToBuy-$modelUser->getCredits(), 0);
		
		$modelConfBuyCredits=new ConfBuyCredits;
		$modelConfBuyCredits->shoppingCartCreditsAmount=$creditsToBuy;
		
		$this->render('index',array(
			'data'=>$shoppingCart,
			'userCreditsAmount'=>$modelUser->getCredits(),
			'modelConfBuyCredits'=>$modelConfBuyCredits,
			'nPhotos'=>$nPhotos,
			'totPrice'=>$totPrice,
			'enableSales'=>$enableSales,
			'discount'=>$discount
		));
	}
	
	public function actionSaveDuration($idDuration, $idProduct){
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id.' and idProduct='.$idProduct;
		$shoppingCart=ShoppingCart::model()->find($criteria);
		$shoppingCart->idDuration=$idDuration;
		$shoppingCart->save();
		$this->redirect(array('shopping_cart/index'));
	}
	
	public function actionAjaxSaveOpt($idProduct_row, $remove=false){
		$ShoppingOpt=explode("_", $idProduct_row);
		
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id.' and idProduct='.$ShoppingOpt[0];
		$shoppingCart=ShoppingCart::model()->find($criteria);
		
		if($remove)
			$shoppingCart->rowSelected=null;
		else
			$shoppingCart->rowSelected=$ShoppingOpt[1];
			
		if(!$shoppingCart->save())
			throw new CHttpException(404, 'Save Shopping Cart Options: something went wrong while saving your option.');
	}
	
	/**
	 * Add or remove a photo to the shopping cart.
	 */
	public function actionAddRemove($idProduct, $refresh=false){
		$model=ShoppingCart::model()->findByPk(array('idProduct'=>$idProduct, 'idUser'=>Yii::app()->user->id));
		$linkSC="ajaxFunctionGeneric('".Yii::app()->createUrl('shopping_cart/addRemove', array('idProduct'=>$idProduct))."', 'shopping_cart')";
		$textSC="Add to Shopping Cart";
		$classSC='btn btn-primary';
		
		if(isset($model)){
			if($model->delete()!=1)
				throw new CHttpException(404, 'Remove from Shopping Cart: something went wrong while deleting the photo #'.$idProduct.' from the shopping cart.');
		}else{
			$model = new ShoppingCart;
			$model->idUser = Yii::app()->user->id;
			$model->idProduct = $idProduct;
			if(!$model->save())
				throw new CHttpException(404, 'Remove from Shopping Cart: something went wrong while saving the photo #'.$idProduct.' in the shopping cart.');
			$textSC="Remove from Cart";
			$classSC='btn';
		}
		
		if($refresh)
			$this->redirect(array('shopping_cart/index'));
		
		echo CHtml::button(
			$textSC,
			array('onclick' => $linkSC, 'class'=>$classSC, 'style'=>'height: 30px')
		);
		$viewDetails = CHtml::link('Details', $model->idProduct0->linkViewPage, array('class'=>'btn'));
		echo $viewDetails;
	}
	
	public function actionBuy(){
		if(Yii::app()->user->id==1)
			throw new CHttpException(404,'Buy photos: super.gsp cannot buy photos.');
		// Read user model logged in
		$modelUser=User::model()->findByPk(Yii::app()->user->id);
		if($modelUser===null)
			throw new CHttpException(404,'Buy photos: something went wrong while reading your profile information.');
		if(!$modelUser->verifySessionIdSecure())
			throw new CHttpException(404, 'Buy photos: you are not authorized to perform this action.');
			
		$enableSales=ConfParameters::model()->findByPk("EnableSales")->value;
		if(!$enableSales && !Yii::app()->user->isAdministrator() && !$modelUser->enableSales())
			throw new CHttpException(404,'Buy photos: sales are closed for maintainance.');
		
		$status=0;
		$error_msg="";
			
		// Read GSP user model
		$modelUserGsp=User::model()->findByPk(1);
		if($modelUserGsp===null)
			throw new CHttpException(404,'Buy photos: something went wrong while reading your profile information.');
			
		if(!isset($_POST['totPrice']))
			throw new CHttpException(404,'Buy photos: something went wrong while reading the total price.');
		
		// Credits of the user before the transaction
		$userCredits_pre=$modelUser->credits;
		$totPrice=$_POST['totPrice'];
	
		// Verify coupon
		$toPay=$totPrice;
		if(isset($modelUser->ownCoupon)){
			if(!$modelUser->ownCoupon->used){
				$discount=$modelUser->ownCoupon->coupon->discount;
				$promocode=$modelUser->ownCoupon->coupon->code;
				$toPay = $totPrice*(1-$discount);
			}
		}
			
		// If the user have the money to pay the transaction
		if($toPay<=$userCredits_pre){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$i=0;
				$totPrice=0;
				$idTransaction=null;
				$photoSold=Array();
				// Ciclo tutte le foto che erano nello shopping cart (lato client!!!)
				while(isset($_POST['ShoppingOptPhoto']['idProduct'][$i][0])){
					$idProduct = $_POST['ShoppingOptPhoto']['idProduct'][$i][0];
					$shoppingOptPhoto=null;
					$partialPrice=0;
					$lastProduct=null;
					if(isset($_POST[$idProduct])){
						foreach($_POST[$idProduct] as $item){ // Per ogni licenza di un singolo prodotto
							// START: Leggo i dettagli dell'opzione di vendita pervenute dal client e la cerco nel nostro DB
							if(!isset($_POST['ShoppingOptPhoto']['idSize'][$i][$item]))
								throw new CHttpException(404,'Buy photos: something went wrong while reading the size of the photo #'.$idProduct);
							if(!isset($_POST['ShoppingOptPhoto']['price'][$i][$item]))
								throw new CHttpException(404,'Buy photos: something went wrong while reading the price of the photo #'.$idProduct);
							$idSize = $_POST['ShoppingOptPhoto']['idSize'][$i][$item];
							$price = $_POST['ShoppingOptPhoto']['price'][$i][$item];
							$criteria=new CDbCriteria;
							$idLicense;
							if(!isset($_POST['PhotoType'][$i]))
								throw new CHttpException(404,'Buy photos: something went wrong while reading the type of the photo #'.$idProduct);
							if($_POST['PhotoType'][$i]=='RF'){
								if(!isset($_POST['ShoppingOptPhoto']['idLicense'][$i][$item]))
									throw new CHttpException(404,'Buy photos: something went wrong while reading the license of the photo #'.$idProduct);
								$idLicense = $_POST['ShoppingOptPhoto']['idLicense'][$i][$item];
								$criteria->condition='t.idProduct='.$idProduct.' AND t.idSize='.$idSize.' AND t.idLicense='.$idLicense.' AND t.price='.$price;
								$criteria->with['idProduct0']['with']['idProduct01']['with']['shoppingCart']['condition']='shoppingCart.idUser='.'\''.Yii::app()->user->id.'\'';
								$shoppingOptPhoto=ShoppingOptPhoto::model()->findAll($criteria);
							}else if($_POST['PhotoType'][$i]=='RM'){
								if(!isset($_POST['ShoppingOptPhoto']['idRMdetails'][$i][$item]))
									throw new CHttpException(404,'Buy photos: something went wrong while reading the license detail of the photo #'.$idProduct);
								if(!isset($_POST['ShoppingOptPhoto']['idDuration'][$i][$item]))
									throw new CHttpException(404,'Buy photos: something went wrong while reading the license duration of the photo #'.$idProduct);
								$idRMdetails = $_POST['ShoppingOptPhoto']['idRMdetails'][$i][$item];
								$idDuration = $_POST['ShoppingOptPhoto']['idDuration'][$i][$item];
								$criteria->condition='t.idProduct='.$idProduct.' AND t.idSize='.$idSize.' AND t.idRMdetails='.$idRMdetails;//.' AND t.price='.$price;
								$criteria->with['idProduct0']['with']['idProduct01']['with']['shoppingCart']['condition']='shoppingCart.idUser='.'\''.Yii::app()->user->id.'\'';
								$shoppingOptPhoto=ShoppingOptPhotoRm::model()->findAll($criteria);
							}
							// END: Leggo i dettagli dell'opzione di vendita pervenute dal client e la cerco nel nostro DB
							
							// Se la licenza esiste nel nostro DB
							if(count($shoppingOptPhoto)>0){
								// Creo la transazione se questa è la prima licenza acquistata
								if($idTransaction==null){
									$modelTransaction = new Transaction;
									$modelTransaction->idTransactionType = 1;
									$modelTransaction->idUser = Yii::app()->user->id;
									$modelTransaction->credits = $_POST['totPrice'];
									$modelTransaction->price = $toPay;
									if(isset($promocode)){
										$modelTransaction->promoCode = $promocode;
										$modelUser->ownCoupon->used=1;
										if(!$modelUser->ownCoupon->save())
											throw new CHttpException(404,'Buy photos: something went wrong while saving the coupon.');
									}if(!$modelTransaction->save())
										throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction.');
									$idTransaction = $modelTransaction->getPrimaryKey();
								}
						
								// 1 inner transition) START: Incremento i crediti dell'autore
								if($shoppingOptPhoto[0]->idProduct0->idProduct01->idUser0->idUser==Yii::app()->user->id)
									throw new CHttpException(404,'Buy photos: you can\'t buy your own photos.'); //altrimenti non mi si incrementano i crediti guadagnati
								// Read the user model of the seller
								$modelSeller=$shoppingOptPhoto[0]->idProduct0->idProduct01->idUser0;
								// Save the email of the seller so I can send him an email after commit
								if(!isset($photoSold[$modelSeller->idUser])){
									$photoSold[$modelSeller->idUser]['cnt']=0;
								}
								// Read the fee of the seller
								$realFeeArray=$modelSeller->realFee;
								$earnedByAuthor=round($price*$realFeeArray['userFee'], 2);
								// realFee prende la fee più grande tra la sua personale e quella di tutte le sue promozioni attive
								$modelSeller->creditsEarned += $earnedByAuthor;
								if(!$modelSeller->save())
									throw new CHttpException(404,'Buy photos: something went wrong while updating the credits of the seller for the photo #'.$idProduct);
								// END: Incremento i crediti dell'autore
						
								// 2 inner transition) START: Sottraggo i crediti all'acquirente
								// Se è un partner gli tolgo la sua commissione
								$earnedByPartner=0;
								if(isset($modelUser->apiKey)){
									if($modelUser->apiKey->isPartner)
										$earnedByPartner=round((($price-$earnedByAuthor)*0.1), 2);
								}
								if(isset($discount)){
									$paidByBuyer=round($price*(1-$discount), 2);
								}else{
									$paidByBuyer=round($price-$earnedByPartner, 2);
								}
								if(!$modelUser->pay($paidByBuyer))
									throw new CHttpException(404,'Buy photos: something went wrong while updating your credits.');
								if(!$modelUser->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving your user information.');
								// END: Sottraggo i crediti all'acquirente
								
								// 3 inner transition) START: Incremento i crediti dell'amministratore gruppo
								// In caso di successo restituisce l'idGroup e earnedByGroup
								$groupArray = $modelSeller->payToGroup($price-$earnedByAuthor-$earnedByPartner);
								if($groupArray!=null){
									$earnedByGroup=round($groupArray['earnedByGroup'], 2);
								}else
									$earnedByGroup=0;
								// END: Incremento i crediti dell'amministratore gruppo
								
								// 4 inner transition) START: Incremento i crediti di GSP
								$earnedByGsp=$paidByBuyer-$earnedByAuthor-$earnedByGroup;
								$modelUserGsp->creditsEarned += $earnedByGsp;
								if(!$modelUserGsp->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving your user information.');
								// END: Incremento i crediti di GSP
								
								$check=round($paidByBuyer-$earnedByAuthor-$earnedByGroup-$earnedByGsp, 2);
								if($check!=0)
									throw new CHttpException(404,'Buy photos: something went wrong while checking the credits distribution: '.
										$paidByBuyer." ".$earnedByAuthor." ".$earnedByGroup." ".$earnedByGsp." ".$check);
						
								// Salvo la transazione relativa alla foto
								// se sto comprando la licenza di una nuova foto
								// (attualmente posso comprare solo una licenza per foto quindi dovrei sempre entrare in questo ciclo)
								if($lastProduct!=$idProduct){
									$modelTransactionPhoto = new TransactionPhoto;
									$modelTransactionPhoto->idTransaction = $idTransaction;
									$modelTransactionPhoto->idProduct = $idProduct;
									$modelTransactionPhoto->licenseType = $_POST['PhotoType'][$i];
									$modelTransactionPhoto->creditsToUser=$earnedByAuthor; // 1 inner transition
									$modelTransactionPhoto->creditsToPartner=$earnedByPartner; // 2 inner transition
									if($groupArray!=null){ // 3 inner transition
										$modelTransactionPhoto->idGroup=$groupArray['idGroup'];
										$modelTransactionPhoto->creditsToGroup=$earnedByGroup;
									}
									$modelTransactionPhoto->creditsToGsp=$earnedByGsp; // 4 inner transition
									// Save the promotion if applied
									if(isset($realFeeArray['idPromotion']))
										$modelTransactionPhoto->idPromotion=$realFeeArray['idPromotion'];
									if(!$modelTransactionPhoto->save())
										throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction photo.');
									$idTransactionPhoto = $modelTransactionPhoto->getPrimaryKey();
									$lastProduct=$idProduct;
								}else{ // Se sto comprando una seconda licenza di una stessa foto, mando un segnale di errore
									throw new CHttpException(404, 'Buy photos: you cannot buy two licenses of the same foto.');
								}
									
								// Save info of the photo sold so I can send the seller an email after commit
								$index=$photoSold[$modelSeller->idUser]['cnt'];
								$photoSold[$modelSeller->idUser]['photos'][$index]['modelProductPp']=$shoppingOptPhoto[0]->idProduct0->idProduct01;
								$photoSold[$modelSeller->idUser]['photos'][$index]['earned']=$earnedByAuthor;
								$photoSold[$modelSeller->idUser]['cnt']++;
								
								// START: Salvo i dettagli della transazione relativa alla foto
								if($_POST['PhotoType'][$i]=='RF'){
									$modelTransactionPhoto_det = new TransactionPhotoRf;
									$modelTransactionPhoto_det->idLicense = $idLicense;
								}else if($_POST['PhotoType'][$i]=='RM'){
									$modelTransactionPhoto_det = new TransactionPhotoRm;
									$modelTransactionPhoto_det->idRMdetails = $idRMdetails;
									$modelTransactionPhoto_det->idDuration = $idDuration;
								}else
									throw new CHttpException(404,'Buy photos: something went wrong while reading the type of the photo #'.$idProduct);
								$modelTransactionPhoto_det->idTransactionPhoto = $idTransactionPhoto;
								$modelTransactionPhoto_det->idSize = $idSize;
								$modelTransactionPhoto_det->price = $price;
								if(!$modelTransactionPhoto_det->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction photo details.');
								// END: Salvo i dettagli della transazione relativa alla foto
									
								// Incremento il prezzo parziale
								$partialPrice=$partialPrice+$price;
							}else{
								throw new CHttpException(404,'Buy photos: something went wrong while reading the shopping options of the photo #'.$idProduct);
							}
						}
						
						$totPrice=$totPrice+$partialPrice;
							
						// Elimino la foto dal carrello
						$model = $shoppingOptPhoto[0]->idProduct0->idProduct01->shoppingCart;
						if(count($model)!=1)
							throw new CHttpException(404,'Buy photos: something went wrong while reading the photo #'.$idProduct.' from your shopping cart.');
						if($model[0]->delete()!=1)
							throw new CHttpException(404,'Buy photos: something went wrong while deleting the photo #'.$idProduct.' from your shopping cart.');
					}
					$i++;
				}
				if($_POST['totPrice']!=$totPrice)
					throw new CHttpException(404,'Buy photos: something went wrong while checking the total price.');
				$transaction->commit();
				//if($enableSales)
				Yii::app()->controller->sendEmailSoldPhotos($photoSold);
				$status=1;
				//$this->redirect(array('photo/purchased'));
			}
			catch(Exception $e){
				$transaction->rollBack();
				$error_msg=$e->getMessage();
				//throw $e;
			}
		}else{
			$error_msg="You do not have enough credits to buy this photos.";
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}
	
	//API
	public function actionGetShoppingOptions($idProduct, $apiKey, $SECURE_SESSION_ID){
		header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
		$json = "{\"errCode\":002}";
    		
		$criteria=new CDbCriteria;
		$criteria->with['apiKey']['condition']="apiKey='".$apiKey."'";
		$modelUser=User::model()->find($criteria);
		
		if(count($modelUser)==1){
			//$enableSession=$modelUser->verifySessionIdSecureByValue($SECURE_SESSION_ID, 1);
			if($modelUser->verifyApiKey($apiKey, 1)/* && $enableSession*/){
				$criteria=new CDbCriteria;
				$criteria->condition='idProduct=:idProduct';
				$criteria->params=array(':idProduct'=>$idProduct);
				$dataShoppingOptPhoto = ShoppingOptPhoto::model()->findAll($criteria);
				$cnt=count($dataShoppingOptPhoto);
				if($cnt>0){
					$photo="";
					for($i=0; $i<$cnt; $i++){
						if($i!=0)
							$photo=$photo.",";
						$photo=$photo.
							"{\"idSize\":".(float)$dataShoppingOptPhoto[$i]->idSize.
							",\"idLicense\":".(float)$dataShoppingOptPhoto[$i]->idLicense.
							",\"credits\":".(float)$dataShoppingOptPhoto[$i]->price."}";
					}
					$json = "{\"option\":[".$photo."],\"count\": ".count($dataShoppingOptPhoto)."}";
				}
			}else
				$json = "{\"errCode\":003}";
		}
		echo $json;
	}

	//API
	public function actionBuyAPI(){
		header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
		$json = "{\"errCode\":002}";
    		
		$criteria=new CDbCriteria;
		//$criteria->condition="username='".$_POST['username']."'";
		$criteria->with['apiKey']['condition']="apiKey='".$_POST['apiKey']."'";
		$modelUser=User::model()->find($criteria);
		
		$enableSession=$modelUser->verifySessionIdSecureByValue($_POST['SECURE_SESSION_ID'], 1);
			
		// Read GSP user model
		$modelUserGsp=User::model()->findByPk(1);
		if($modelUserGsp===null)
			throw new CHttpException(404,'Buy photos: something went wrong while reading your profile information.');
		
		$enableSales=ConfParameters::model()->findByPk("EnableSales")->value;
		
		if($enableSales && count($modelUser)==1 && $enableSession){
			if($modelUser->verifyApiKey($_POST['apiKey'], 1)){
				// Credits of the user before the transaction
				$userCredits_pre=$modelUser->credits;
					
				// If the user have the money to pay the transaction
				if($_POST['totPrice']<=$userCredits_pre){
					$transaction = Yii::app()->db->beginTransaction();
					try{
						$totPrice=0;
						$idTransaction=null;
						$photoSold=Array();
						// Ciclo tutte le foto che erano nello shopping cart (lato client!!!)
						for($i=0; $i<$_POST['cntPhotos']; $i++){
							$idProduct = $_POST['photos'][$i]['idProduct'];
							$idSize = $_POST['photos'][$i]['idSize'];
							$price = $_POST['photos'][$i]['price'];
							$idLicense = $_POST['photos'][$i]['idLicense'];
							$partialPrice=0;
							$lastProduct=null;
							
							// START: Leggo i dettagli dell'opzione di vendita pervenute dal client e la cerco nel nostro DB
							$criteria=new CDbCriteria;
							$criteria->condition='t.idProduct='.$idProduct.' AND t.idSize='.$idSize.' AND t.idLicense='.$idLicense.' AND t.price='.$price;
							$shoppingOptPhoto=ShoppingOptPhoto::model()->findAll($criteria);
							// END: Leggo i dettagli dell'opzione di vendita pervenute dal client e la cerco nel nostro DB
									
							// Se la licenza esiste nel nostro DB
							if(count($shoppingOptPhoto)>0){
								// Creo la transazione se questa è la prima licenza acquistata
								if($idTransaction==null){
									$modelTransaction = new Transaction;
									$modelTransaction->idTransactionType = 1;
									$modelTransaction->idUser = $modelUser->idUser;
									$modelTransaction->credits = $_POST['totPrice'];
									if(!$modelTransaction->save())
										throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction.');
									$idTransaction = $modelTransaction->getPrimaryKey();
								}
								
								// 1 inner transition) START: Incremento i crediti dell'autore
								if($shoppingOptPhoto[0]->idProduct0->idProduct01->idUser0->idUser==$modelUser->idUser)
									throw new CHttpException(404,'Buy photos: you can\'t buy your own photos.'); //altrimenti non mi si incrementano i crediti guadagnati
								// Read the user model of the seller
								$modelSeller=$shoppingOptPhoto[0]->idProduct0->idProduct01->idUser0;
								// Save the email of the seller so I can send hime an email after commit
								if(!isset($photoSold[$modelSeller->idUser])){
									$photoSold[$modelSeller->idUser]['cnt']=0;
								}
								// Read the fee of the seller
								$realFeeArray=$modelSeller->realFee;
								$earnedByAuthor=round($price*$realFeeArray['userFee'], 2);
								// realFee prende la fee più grande tra la sua personale e quella di tutte le sue promozioni attive
								$modelSeller->creditsEarned += $earnedByAuthor;
								if(!$modelSeller->save())
									throw new CHttpException(404,'Buy photos: something went wrong while updating the credits of the seller for the photo #'.$idProduct);
								// END: Incremento i crediti dell'autore
						
								// 2 inner transition) START: Sottraggo i crediti all'acquirente
								// Se è un partner gli tolgo la sua commissione
								$earnedByPartner=0;
								if(isset($modelUser->apiKey))
									if($modelUser->apiKey->isPartner)
										$earnedByPartner=round((($price-$earnedByAuthor)*0.1), 2);
								$paidByBuyer=round($price-$earnedByPartner, 2);
								if(!$modelUser->pay($paidByBuyer))
									throw new CHttpException(404,'Buy photos: something went wrong while updating your credits.');
								if(!$modelUser->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving your user information.');
								// END: Sottraggo i crediti all'acquirente
								
								// 3 inner transition) START: Incremento i crediti dell'amministratore gruppo
								// In caso di successo restituisce l'idGroup e earnedByGroup
								$groupArray = $modelSeller->payToGroup($price-$earnedByAuthor-$earnedByPartner);
								if($groupArray!=null){
									$earnedByGroup=round($groupArray['earnedByGroup'], 2);
								}else
									$earnedByGroup=0;
								// END: Incremento i crediti dell'amministratore gruppo
								
								// 4 inner transition) START: Incremento i crediti di GSP
								$earnedByGsp=$price-$earnedByAuthor-$earnedByPartner-$earnedByGroup;
								$modelUserGsp->creditsEarned += $earnedByGsp;
								if(!$modelUserGsp->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving your user information.');
								// END: Incremento i crediti di GSP
								
								$check=round($paidByBuyer-$earnedByAuthor-$earnedByGroup-$earnedByGsp, 2);
								if($check!=0)
									throw new CHttpException(404,'Buy photos: something went wrong while checking the credits distribution: '.
										$paidByBuyer." ".$earnedByAuthor." ".$earnedByGroup." ".$earnedByGsp." ".$check);
								
								// Salvo la transazione relativa alla foto
								// se sto comprando la licenza di una nuova foto
								// (attualmente posso comprare solo una licenza per foto quindi dovrei sempre entrare in questo ciclo)
								if($lastProduct!=$idProduct){
									$modelTransactionPhoto = new TransactionPhoto;
									$modelTransactionPhoto->idTransaction = $idTransaction;
									$modelTransactionPhoto->idProduct = $idProduct;
									$modelTransactionPhoto->licenseType = 'RF';
									$modelTransactionPhoto->creditsToUser=$earnedByAuthor; // 1 inner transition
									$modelTransactionPhoto->creditsToPartner=$earnedByPartner; // 2 inner transition
									if($groupArray!=null){ // 3 inner transition
										$modelTransactionPhoto->idGroup=$groupArray['idGroup'];
										$modelTransactionPhoto->creditsToGroup=$earnedByGroup;
									}
									$modelTransactionPhoto->creditsToGsp=$earnedByGsp; // 4 inner transition
									// Save the promotion if applied
									if(isset($realFeeArray['idPromotion']))
										$modelTransactionPhoto->idPromotion=$realFeeArray['idPromotion'];
									if(!$modelTransactionPhoto->save())
										throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction photo.');
								
									$idTransactionPhoto = $modelTransactionPhoto->getPrimaryKey();
									$lastProduct=$idProduct;
								}else{ // Se sto comprando una seconda licenza di una stessa foto, mando un segnale di errore
									throw new CHttpException(404, 'Buy photos: you cannot buy two licenses of the same foto.');
								}
									
								// Save info of the photo sold so I can send the seller an email after commit
								$index=$photoSold[$modelSeller->idUser]['cnt'];
								$photoSold[$modelSeller->idUser]['photos'][$index]['modelProductPp']=$shoppingOptPhoto[0]->idProduct0->idProduct01;
								$photoSold[$modelSeller->idUser]['photos'][$index]['earned']=$earnedByAuthor;
								$photoSold[$modelSeller->idUser]['cnt']++;
								
								// START: Salvo i dettagli della transazione relativa alla foto
								$modelTransactionPhoto_det = new TransactionPhotoRf;
								$modelTransactionPhoto_det->idLicense = $idLicense;
								$modelTransactionPhoto_det->idTransactionPhoto = $idTransactionPhoto;
								$modelTransactionPhoto_det->idSize = $idSize;
								$modelTransactionPhoto_det->price = $price;
								if(!$modelTransactionPhoto_det->save())
									throw new CHttpException(404,'Buy photos: something went wrong while saving the transaction photo details.');
								// END: Salvo i dettagli della transazione relativa alla foto
									
								// Incremento il prezzo parziale
								$partialPrice=$partialPrice+$price;
								$totPrice=$totPrice+$partialPrice;
							}
						}
						if($_POST['totPrice']!=$totPrice)
							throw new CHttpException(404,'Buy photos: something went wrong while checking the total price.');
						$transaction->commit();
						Yii::app()->controller->sendEmailSoldPhotos($photoSold);
						$json = "{\"errCode\":000}";
					}
					catch(Exception $e){
						$transaction->rollBack();
						//$error_msg=$e->getMessage();
					}
				}
			}else
				$json = "{\"errCode\":001}";
		}
		
		echo $json;
	}
	
	private function sendEmailSoldPhotos($photoSold){
		//print_r($photoSold);
		foreach($photoSold as $idUser=>$photos){
			$modelUser=User::model()->findByPk($idUser);
			
			$message = new YiiMailMessage;
			$message->view = 'soldPhotos';
			$message->setBody(array('modelUser'=>$modelUser, 'photos'=>$photos), 'text/html');
			$message->addTo($modelUser->email);
			$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
			$message->setSubject('Sale on GeoStockPhoto');
			Yii::app()->mail->send($message);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($idUser, $idProduct)
	{
		$model=ShoppingCart::model()->findByPk((int)$idUser, (int)$idProduct);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shopping_cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
