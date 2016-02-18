<?php

class PaypalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/operative';
	 
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('notifyPaypalPayment','buyCreditsSuccess','buyCreditsFailure'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('buyCreditsSelect','buyCreditsCart'), 
				'users'=>array('@'),
			),
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('notifyPaypalPayment','buyCreditsSuccess','buyCreditsFailure'), 
				'users'=>array('guest'),
			),*/

			array('deny',  // deny all users
	//			'actions'=>array('notifyPaypalPayment','buyCreditFail', //user guest
	//				'notifyPaypalPayment','buyCreditsSuccess','buyCreditsFailure', //user *
	//				'buyCreditsSelect', //user @
	//		 	),
				'users'=>array('*'),
			),
		);
	}

	public $user;
	public $idPhotoType=1;	
	public function actionBuyCreditsCart(){
		$modelUser=User::model()->findByPk(Yii::app()->user->id);
		if($modelUser===null)
			throw new CHttpException(404,'Buy credits cart: something went wrong while reading your profile information.');
		if((!isset($_POST['shoppingCartCreditsAmount']))&&(!isset($_POST['ConfBuyCredits'])))
			throw new CHttpException(404,'Buy credits cart: something went wrong while reading the total price.');
			
		$modelConfPaypal=ConfPaypal::model()->findByPk(Yii::app()->params['paypalEnv']);	                                                   
		if($modelConfPaypal===null)                                                                          
			throw new CHttpException(404,'Buy credits cart: The Paypal Config is not loaded for env:'.Yii::app()->params['paypalEnv']);                

		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile($modelConfPaypal->urlJSdigitalGoods, CClientScript::POS_HEAD);	
		
		if(isset($_POST['ConfBuyCredits'])){
			$transaction = Yii::app()->db->beginTransaction();
			try{				
				$currency = ConfParameters::model()->findByPk('Currency')->value;
				$data = array();
				$amount=$_POST['ConfBuyCredits']['shoppingCartCreditsAmount'];
				$data['APIUSERNAME']=$modelConfPaypal->apiUserName;//'marco_1327721282_biz_api1.geostockphoto.com';
				$data['APIPASSWORD']=$modelConfPaypal->apiPassword;//'1327721322';
				$data['APISIGNATURE']=$modelConfPaypal->apiSignature;//'ACeF78uYbWw5PAqdQGdsZ23o4BqpAAfse6f-QZvdF7pMu7WTyVl3wAmM';
				$data['VERSION']=$modelConfPaypal->version;//'84.0';
				$data['METHOD']='SetExpressCheckout';
				$data['RETURNURL']=Yii::app()->createAbsoluteUrl('paypal/buyCreditsSuccess');
				$data['CANCELURL']=Yii::app()->createAbsoluteUrl('paypal/buyCreditsFailure');
				$data['PAYMENTREQUEST_0_CURRENCYCODE']=$currency;
				$data['PAYMENTREQUEST_0_AMT']=$amount;
				$data['PAYMENTREQUEST_0_ITEMAMT']=$amount;
				$data['PAYMENTREQUEST_0_TAXAMT']='0';
				$data['PAYMENTREQUEST_0_DESC']=$modelUser->username.' credits';
				$data['PAYMENTREQUEST_0_PAYMENTACTION']='Sale';
				$data['PAYMENTREQUEST_0_NOTIFYURL'] = Yii::app()->createAbsoluteUrl('paypal/notifyPaypalPayment'); // OPTIONAL - for database integration, back office integration, scalability, etcPAYMENTREQUEST_0_NOTIFYURL
				$data['L_PAYMENTREQUEST_0_ITEMCATEGORY0']='Digital';
				$data['L_PAYMENTREQUEST_0_NAME0']=$modelUser->username.' credits';
				$data['L_PAYMENTREQUEST_0_NUMBER0']=$amount;
				$data['L_PAYMENTREQUEST_0_QTY0']='1';//$modelConfBuyCredits->idCreditsPacket;
				$data['L_PAYMENTREQUEST_0_TAXAMT0']='0';
				$data['L_PAYMENTREQUEST_0_AMT0']=$amount;
				$data['L_PAYMENTREQUEST_0_DESC0']='Download';
				$data['LANDINGPAGE']='Billing';
			    $data['SOLUTIONTYPE']='Sole';

				$req_str = $this->prepareRequestSetExpressCheckout($data);
				$idPPTransaction = $this->storeSetExpressCheckoutRequest($data);		
				$response = $this->PPHttpPost($modelConfPaypal->endPoint, $req_str);
				
				//check Response
				if($response['ACK'] == "Success" || $response['ACK'] == "SuccessWithWarning") { 
					//setup redirect URL 
					$redirect_url = $modelConfPaypal->redirectUrl . urldecode($response['TOKEN']); 
					$this->storeSetExpressCheckoutResponseSuccess($response,$idPPTransaction);
					$this->storePaypalGspIntegration($response, -1 , $amount);  // Nel caso sia una vendita da Carrello idPacket=-1

					// If successful, grab our token and redirect the buyer to PayPal.
					//header("Location: https://www.sandbox.paypal.com/incontext?token=" . $response["TOKEN"]); // SANDBOX PayPal URL
					header("Location: ".$redirect_url); // SANDBOX PayPal URL
					//header("Location: https://www.paypal.com/incontext?token=" . $response["TOKEN"]); // LIVE PayPal URL
				} else if(	$response['ACK'] == "Failure" || $response['ACK'] == "FailureWithWarning") { 
					//echo print_r($response);
					$this->storeSetExpressCheckoutResponseFailure($response,$idPPTransaction);			
					$this->gspLog("error","SetExpressCheckout ACK: Failure for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
					$this->renderPartial('buyCreditsFailure');			
				}else{
					$this->gspLog("error","Paypal API error - SetExpressCheckout - Protocol Error - for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
					$this->renderPartial('buyCreditsFailure');				 
				}		
						
				$transaction->commit();
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'Buy Credits Cart: Transaction error. ');
			}
		
		}else{
			$amount=$_POST['shoppingCartCreditsAmount'];
			$modelConfBuyCredits=new ConfBuyCredits;
			$modelConfBuyCredits->shoppingCartCreditsAmount=$amount-$modelUser->getCredits();
			
			$this->render('buyCreditsCart',array(
				'modelConfBuyCredits'=>$modelConfBuyCredits,
			));
		}
	}
	
	public function actionBuyCreditsSelect(){
		$modelConfPaypal=ConfPaypal::model()->findByPk(Yii::app()->params['paypalEnv']);	                                                   
		if($modelConfPaypal===null)                                                                          
			throw new CHttpException(404,'Buy credits select: The Paypal Config is not loaded for env:'.Yii::app()->params['paypalEnv']);
				
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile($modelConfPaypal->urlJSdigitalGoods, CClientScript::POS_HEAD);		
	
		if(isset($_POST['ConfBuyCredits'])){	
			$transaction = Yii::app()->db->beginTransaction();		
			try{				
				$currency = ConfParameters::model()->findByPk('Currency')->value;
				$creditsCount = $_POST['ConfBuyCredits']['idCreditsPacket'];			
				$modelConfBuyCredits=ConfBuyCredits::model()->findByPk($creditsCount);		
				if($modelConfBuyCredits===null)                                                                          
					throw new CHttpException(404,'Buy credits select: something went wrong while retrieving credits packet list');
					
				$data = array();
				
				$data['APIUSERNAME']=$modelConfPaypal->apiUserName;
				$data['APIPASSWORD']=$modelConfPaypal->apiPassword;
				$data['APISIGNATURE']=$modelConfPaypal->apiSignature;
				$data['VERSION']=$modelConfPaypal->version;
				$data['METHOD']='SetExpressCheckout';
				$data['RETURNURL']=Yii::app()->createAbsoluteUrl('paypal/buyCreditsSuccess');
				$data['CANCELURL']=Yii::app()->createAbsoluteUrl('paypal/buyCreditsFailure');
				$data['PAYMENTREQUEST_0_CURRENCYCODE']=$currency;
				$data['PAYMENTREQUEST_0_AMT']=$modelConfBuyCredits->amount;
				$data['PAYMENTREQUEST_0_ITEMAMT']=$modelConfBuyCredits->amount;
				$data['PAYMENTREQUEST_0_TAXAMT']='0';
				$data['PAYMENTREQUEST_0_DESC']='Credits';
				$data['PAYMENTREQUEST_0_PAYMENTACTION']='Sale';
				$data['PAYMENTREQUEST_0_NOTIFYURL'] = Yii::app()->createAbsoluteUrl('paypal/notifyPaypalPayment'); // OPTIONAL - for database integration, back office integration, scalability, etcPAYMENTREQUEST_0_NOTIFYURL
				$data['L_PAYMENTREQUEST_0_ITEMCATEGORY0']='Digital';
				$data['L_PAYMENTREQUEST_0_NAME0']=$modelConfBuyCredits->description;
				$data['L_PAYMENTREQUEST_0_NUMBER0']=$modelConfBuyCredits->amount;
				$data['L_PAYMENTREQUEST_0_QTY0']='1';$modelConfBuyCredits->idCreditsPacket;
				$data['L_PAYMENTREQUEST_0_TAXAMT0']='0';
				$data['L_PAYMENTREQUEST_0_AMT0']=$modelConfBuyCredits->amount;
				$data['L_PAYMENTREQUEST_0_DESC0']='Download';
				$data['LANDINGPAGE']='Billing';
			    $data['SOLUTIONTYPE']='Sole';
						
				$req_str = $this->prepareRequestSetExpressCheckout($data);				
				$idPPTransaction = $this->storeSetExpressCheckoutRequest($data);			
				$response = $this->PPHttpPost($modelConfPaypal->endPoint, $req_str);
				
				//check Response
				if($response['ACK'] == "Success" || $response['ACK'] == "SuccessWithWarning") { 
					//setup redirect URL 
					$redirect_url = $modelConfPaypal->redirectUrl . urldecode($response['TOKEN']); 				
					$this->storeSetExpressCheckoutResponseSuccess($response,$idPPTransaction);
					//Nel caso in cui la vendita sia con packet il numero di crediti da considerare è uguale a idCreditsPacket 				
					$this->storePaypalGspIntegration($response,$creditsCount,$creditsCount);  
					
					// If successful, grab our token and redirect the buyer to PayPal.
					//header("Location: https://www.sandbox.paypal.com/incontext?token=" . $response["TOKEN"]); // SANDBOX PayPal URL
					header("Location: ".$redirect_url); // SANDBOX PayPal URL
					//header("Location: https://www.paypal.com/incontext?token=" . $response["TOKEN"]); // LIVE PayPal URL				
					
				} else if(	$response['ACK'] == "Failure" || $response['ACK'] == "FailureWithWarning") { 
					$this->storeSetExpressCheckoutResponseFailure($response,$idPPTransaction);				
					$this->gspLog("error","SetExpressCheckout ACK: Failure for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);			
					$this->renderPartial('buyCreditsFailure');
				}else{
					$this->gspLog("error","Paypal API error - SetExpressCheckout - Protocol Error - for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
					$this->renderPartial('buyCreditsFailure');
				}
				$transaction->commit();
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'BuyCreditsSelect: Transaction error. ');
			}
		
		}else{
			if(isset($_POST['x'])&& isset($_POST['y'])){
				//Qui no dovrebbe più entrare perchè  c'è  almeno un radioButton selezionato nella lista all'apertura della pagina
				$this->renderPartial('buyCreditsUnselected');
			}else{
				$modelConfBuyCredits=new ConfBuyCredits;				
				$criteria=new CDbCriteria;
				//Seleziono prendo tutti i dati ad esclusione del idCreditsPacket=-1 che è utilizzato per la vendita del cart
				$criteria->condition='idCreditsPacket<>-1';
				$confBuyCredits=ConfBuyCredits::model()->findAll($criteria);
				
				$this->render('buyCreditsSelect',array(
					'modelConfBuyCredits'=>$modelConfBuyCredits,
					'submitted'=>false,
					'confBuyCredits'=>$confBuyCredits,
				));
			}
		}
	}
		
	public function actionBuyCreditsSuccess()
	{
		$modelConfPaypal=ConfPaypal::model()->findByPk(Yii::app()->params['paypalEnv']);	                                                   
		if($modelConfPaypal===null)                                                                          
			throw new CHttpException(404,'The Paypal Config is not loaded for env:'.Yii::app()->params['paypalEnv']);                    
				
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile($modelConfPaypal->urlJSdigitalGoods, CClientScript::POS_HEAD);
		
		$token = $_GET['token']; 
		$payerid = $_GET['PayerID'];

		$transaction = Yii::app()->db->beginTransaction();	
		try{					
			$currency = ConfParameters::model()->findByPk('Currency')->value;
			$this->updateStoredSetExpressCheckOut($token, $payerid);
			
			/******************************/
			$data = array();
			$data['APIUSERNAME']=$modelConfPaypal->apiUserName;//'marco_1327721282_biz_api1.geostockphoto.com';
			$data['APIPASSWORD']=$modelConfPaypal->apiPassword;//'1327721322';
			$data['APISIGNATURE']=$modelConfPaypal->apiSignature;//'ACeF78uYbWw5PAqdQGdsZ23o4BqpAAfse6f-QZvdF7pMu7WTyVl3wAmM';
			$data['VERSION']=$modelConfPaypal->version;//'84.0';
			$data['TOKEN']=$token;	
			
			// Richiamo la GetExpressCheckoutDetails		
			$data['METHOD']='GetExpressCheckoutDetails';		
			$req_str = $this->prepareRequestGetExpressCheckout($data);		
			$idPPTransaction = $this->storeGetExpressCheckoutDetailsRequest($data);	
			$response = $this->PPHttpPost($modelConfPaypal->endPoint, $req_str);
			
			//Momorizzo la risposta al 	GetExpressCheckoutDetails	
			if($response['ACK'] == "Success" || $response['ACK'] == "SuccessWithWarning") {			
				$this->storeGetExpressCheckoutDetailsResponseSuccess($response,$idPPTransaction);
			} else if(	$response['ACK'] == "Failure" || $response['ACK'] == "FailureWithWarning") { 
				$this->storeGetExpressCheckoutDetailsResponseFailure($response,$idPPTransaction);						
				$this->gspLog("error","GetExpressCheckoutDetails ACK: Failure for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
				$this->renderPartial('buyCreditsFailure');				 			
			}else{
				$this->gspLog("error","Paypal API error - GetExpressCheckoutDetails - Protocol Error - for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
				$this->renderPartial('buyCreditsFailure');
			}
				
			//get total 
			$amount = urldecode($response['PAYMENTREQUEST_0_AMT']); 
			$desc = urldecode($response['PAYMENTREQUEST_0_DESC']);
			$data['TOKEN']=$response['TOKEN'];
			$data['METHOD']='DoExpressCheckoutPayment';
			$data['PAYERID']=$payerid;
			$data['PAYMENTREQUEST_0_CURRENCYCODE']=$currency;
			$data['PAYMENTREQUEST_0_AMT']=$amount;
			$data['PAYMENTREQUEST_0_ITEMAMT']=$amount;
			$data['PAYMENTREQUEST_0_TAXAMT']='0';
			$data['PAYMENTREQUEST_0_DESC']='Credits';
			$data['PAYMENTREQUEST_0_PAYMENTACTION']='Sale';
			$data['L_PAYMENTREQUEST_0_ITEMCATEGORY0']='Digital';
			$data['L_PAYMENTREQUEST_0_NAME0']=$desc;
			$data['L_PAYMENTREQUEST_0_NUMBER0']='1';
			$data['L_PAYMENTREQUEST_0_QTY0']='1';
			$data['L_PAYMENTREQUEST_0_TAXAMT0']='0';
			$data['L_PAYMENTREQUEST_0_AMT0']=$amount;
			$data['L_PAYMENTREQUEST_0_DESC0']='Download';
			$doec_str = $this->prepareRequestDoExpressCheckoutPayment($data);
			$idPPTransaction = $this->storeDoExpressCheckoutPaymentRequest($data);
			//make the DoEC Call: 
			$doresponse =  $this->PPHttpPost($modelConfPaypal->endPoint, $doec_str);
			//check Response 
			if($doresponse['ACK'] == "Success" || $doresponse['ACK'] == "SuccessWithWarning") { 
			 	$this->storeDoExpressCheckoutPaymentResponseSuccess($doresponse,$idPPTransaction, $payerid);
				$this->storeCorrectGSPTransactionIntegrationIncrementUserCredits($idPPTransaction);
				$this->renderPartial('buyCreditsSuccess',array(
					'amount'=>$amount
				));
			//place in logic to make digital goods available 
			} else if($doresponse['ACK'] == "Failure" || $doresponse['ACK'] == "FailureWithWarning") { 
				$this->storeDoExpressCheckoutPaymentResponseFailure($doresponse,$idPPTransaction);
				$this->gspLog("error","The API Call Failed for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
				$this->renderPartial('buyCreditsFailure');				 
			}else{
				$this->gspLog("error","Paypal API error - DoExpressCheckoutPayment - Protocol Error - for user: ".Yii::app()->user->id. " with correlationID: ".$response['CORRELATIONID']);				
				$this->renderPartial('buyCreditsFailure');				 
			}
			$transaction->commit();
		}
		catch(Exception $e){ // an exception is raised if a query fails
			$transaction->rollBack();
			throw new CHttpException(404,'BuyCreditsSuccess: '.$e->getMessage());
		}
	}

	public function actionBuyCreditsFailure()
	{
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('https://www.paypalobjects.com/js/external/dg.js', CClientScript::POS_HEAD);
		$this->storeTransactionInterrupted($_GET['token']);			
		$this->renderPartial('buyCreditsFailure');
	}

	public function actionNotifyPaypalPayment()
	{	
	//$this->render('buyCreditsSelect',array(
	//		//	'redirect_url'=>$redirect_url,
	//			'modelConfBuyCredits'=>$modelConfBuyCredits,
	//			'submitted'=>false,
	//			'confBuyCredits'=>$confBuyCredits,
	//		));
	}
	
	private function prepareRequestSetExpressCheckout($data){
	
		$APIUSERNAME  = $data['APIUSERNAME']; //"marco_1327721282_biz_api1.geostockphoto.com";   
		$APIPASSWORD  = $data['APIPASSWORD']; //"1327721322";   
		$APISIGNATURE = $data['APISIGNATURE']; //"ACeF78uYbWw5PAqdQGdsZ23o4BqpAAfse6f-QZvdF7pMu7WTyVl3wAmM";   
		$VERSION      = $data['VERSION']; //"84.0"; //must be >= 65.1   
		
		//Build the Credential String:   
		$cred_str = "USER=" . $APIUSERNAME . "&PWD=" . $APIPASSWORD . "&SIGNATURE=" . $APISIGNATURE . "&VERSION=" . $VERSION;   
		//For Testing this is hardcoded. You would want to set these variable values dynamically   
	
		//$nvp_str  = "&METHOD=SetExpressCheckout"    . "&RETURNURL=http://localhost/workspace-aptana/paypal2/return.php" 
		$nvp_str  = "&METHOD=".$data['METHOD']."&RETURNURL=".$data['RETURNURL']
	
		//set your Return URL here       
		. "&CANCELURL=".$data['CANCELURL'] //http://localhost/workspace-aptana/paypal2/return.php" 
		//set your Cancel URL here
		. "&PAYMENTREQUEST_0_CURRENCYCODE=".$data['PAYMENTREQUEST_0_CURRENCYCODE']//EUR"       
		. "&PAYMENTREQUEST_0_AMT=".$data['PAYMENTREQUEST_0_AMT']//1"    
		. "&PAYMENTREQUEST_0_ITEMAMT=".$data['PAYMENTREQUEST_0_ITEMAMT']//1"    
		. "&PAYMENTREQUEST_0_TAXAMT=".$data['PAYMENTREQUEST_0_TAXAMT']//0"    
		. "&PAYMENTREQUEST_0_DESC=".$data['PAYMENTREQUEST_0_DESC']//Credits"    
		. "&PAYMENTREQUEST_0_PAYMENTACTION=".$data['PAYMENTREQUEST_0_PAYMENTACTION']//Sale"    
		. "&PAYMENTREQUEST_0_NOTIFYURL=".$data['PAYMENTREQUEST_0_NOTIFYURL']
		. "&L_PAYMENTREQUEST_0_ITEMCATEGORY0=".$data['L_PAYMENTREQUEST_0_ITEMCATEGORY0']//Digital"   
		. "&L_PAYMENTREQUEST_0_NAME0=".$data['L_PAYMENTREQUEST_0_NAME0']//Credits"    
		. "&L_PAYMENTREQUEST_0_NUMBER0=".$data['L_PAYMENTREQUEST_0_NUMBER0']//1"    
		. "&L_PAYMENTREQUEST_0_QTY0=".$data['L_PAYMENTREQUEST_0_QTY0']//1"    
		. "&L_PAYMENTREQUEST_0_TAXAMT0=".$data['L_PAYMENTREQUEST_0_TAXAMT0']//0"    
		. "&L_PAYMENTREQUEST_0_AMT0=".$data['L_PAYMENTREQUEST_0_AMT0']//1"    
		. "&L_PAYMENTREQUEST_0_DESC0=".$data['L_PAYMENTREQUEST_0_DESC0']//Download";
		. "&LANDINGPAGE=".$data['LANDINGPAGE']//Billing
		. "&SOLUTIONTYPE=".$data['SOLUTIONTYPE']; //Sole
		
		return $req_str = $cred_str . $nvp_str; 
	}	
	
	private function prepareRequestGetExpressCheckout($data){
		$APIUSERNAME  = $data['APIUSERNAME'];    
		$APIPASSWORD  = $data['APIPASSWORD'];    
		$APISIGNATURE = $data['APISIGNATURE'];    
		$VERSION      = $data['VERSION'];   
		
		//Build the Credential String:   
		$cred_str = "USER=" . $APIUSERNAME . "&PWD=" . $APIPASSWORD . "&SIGNATURE=" . $APISIGNATURE . "&VERSION=" . $VERSION;   
		//For Testing this is hardcoded. You would want to set these variable values dynamically   
		$nvp_str  = "&METHOD=".$data['METHOD']."&TOKEN=".urldecode($data['TOKEN']);
		
		return $req_str = $cred_str . $nvp_str; 
	}	
	
	private function prepareRequestDoExpressCheckoutPayment($data){
	
		$APIUSERNAME  = $data['APIUSERNAME'];    
		$APIPASSWORD  = $data['APIPASSWORD'];    
		$APISIGNATURE = $data['APISIGNATURE'];   
		$VERSION      = $data['VERSION'];    
		
		//Build the Credential String:   
		$cred_str = "USER=" . $APIUSERNAME . "&PWD=" . $APIPASSWORD . "&SIGNATURE=" . $APISIGNATURE . "&VERSION=" . $VERSION;   
		//For Testing this is hardcoded. You would want to set these variable values dynamically   
	
		//$nvp_str  = "&METHOD=SetExpressCheckout"    . "&RETURNURL=http://localhost/workspace-aptana/paypal2/return.php" 
		$nvp_str  = "&METHOD=".$data['METHOD']
		."&TOKEN=".$data['TOKEN']
		. "&PAYERID=".$data['PAYERID'] //http://localhost/workspace-aptana/paypal2/return.php" 
		//set your Cancel URL here
		. "&PAYMENTREQUEST_0_CURRENCYCODE=".$data['PAYMENTREQUEST_0_CURRENCYCODE']//EUR"       
		. "&PAYMENTREQUEST_0_AMT=".$data['PAYMENTREQUEST_0_AMT']//1"    
		. "&PAYMENTREQUEST_0_ITEMAMT=".$data['PAYMENTREQUEST_0_ITEMAMT']//1"    
		. "&PAYMENTREQUEST_0_TAXAMT=".$data['PAYMENTREQUEST_0_TAXAMT']//0"    
		. "&PAYMENTREQUEST_0_DESC=".$data['PAYMENTREQUEST_0_DESC']//Credits"    
		. "&PAYMENTREQUEST_0_PAYMENTACTION=".$data['PAYMENTREQUEST_0_PAYMENTACTION']//Sale"    
		. "&L_PAYMENTREQUEST_0_ITEMCATEGORY0=".$data['L_PAYMENTREQUEST_0_ITEMCATEGORY0']//Digital"   
		. "&L_PAYMENTREQUEST_0_NAME0=".$data['L_PAYMENTREQUEST_0_NAME0']//Credits"    
		. "&L_PAYMENTREQUEST_0_NUMBER0=".$data['L_PAYMENTREQUEST_0_NUMBER0']//1"    
		. "&L_PAYMENTREQUEST_0_QTY0=".$data['L_PAYMENTREQUEST_0_QTY0']//1"    
		. "&L_PAYMENTREQUEST_0_TAXAMT0=".$data['L_PAYMENTREQUEST_0_TAXAMT0']//0"    
		. "&L_PAYMENTREQUEST_0_AMT0=".$data['L_PAYMENTREQUEST_0_AMT0']//1"    
		. "&L_PAYMENTREQUEST_0_DESC0=".$data['L_PAYMENTREQUEST_0_DESC0'];//Download"; 
		
		
		return $req_str = $cred_str . $nvp_str; 
	}	

	/* *functions.php * *holds functions for EC for index.php and return.php for Digital Goods EC Calls */
	//Function PPHttpPost 
	//Makes an API call using an NVP String and an Endpoint
	private function PPHttpPost($my_endpoint, $my_api_str){
	    // setting the curl parameters. 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $my_endpoint); 
		curl_setopt($ch, CURLOPT_VERBOSE, 1); 
		// turning off the server and peer verification(TrustManager Concept). 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POST, 1); 
		// setting the NVP $my_api_str as POST FIELD to curl 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $my_api_str);
	// getting response from server 
		$httpResponse = curl_exec($ch); 
				
		if(!$httpResponse) {    
			$response = "API_method failed: ".curl_error($ch).'('.curl_errno($ch).')';    
			return $response; 
		} 
	
		$httpResponseAr = explode("&", $httpResponse);
		$httpParsedResponseAr = array(); 
	
		foreach ($httpResponseAr as $i => $value) {   
			$tmpAr = explode("=", $value);   
			if(sizeof($tmpAr) > 1) {    
				$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];   
			} 
		} 
	
		if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		   $response = "Invalid HTTP Response for POST request($my_api_str) to $API_Endpoint.";   
		   return $response; 
		} 
		return $httpParsedResponseAr; 
	}

	private function storeSetExpressCheckoutRequest($data){
			$modelPPTransactionFlow= new PaypalTransactionFlow();
			$modelPPTransactionFlow->idUser                  = Yii::app()->user->id;
			$modelPPTransactionFlow->method                  = $data['METHOD'];     
			$modelPPTransactionFlow->returnUrl               = $data['RETURNURL'];     
			$modelPPTransactionFlow->cancelUrl               = $data['CANCELURL'];     
			$modelPPTransactionFlow->version                 = $data['VERSION'];     
			$modelPPTransactionFlow->pr0NotifyUrl            = $data['PAYMENTREQUEST_0_NOTIFYURL'];     
			$modelPPTransactionFlow->pr0CurrencyCode         = $data['PAYMENTREQUEST_0_CURRENCYCODE'];     
			$modelPPTransactionFlow->pr0Amt                  = $data['PAYMENTREQUEST_0_AMT'];     
			$modelPPTransactionFlow->pr0ItemAmt              = $data['PAYMENTREQUEST_0_ITEMAMT'];     
			$modelPPTransactionFlow->pr0TaxAmt               = $data['PAYMENTREQUEST_0_TAXAMT'];     
			$modelPPTransactionFlow->pr0Desc                 = $data['PAYMENTREQUEST_0_TAXAMT'];     
			$modelPPTransactionFlow->pr0PaymentAction        = $data['PAYMENTREQUEST_0_PAYMENTACTION'];     
			$modelPPTransactionFlow->lpr0ItemCategory0       = $data['L_PAYMENTREQUEST_0_ITEMCATEGORY0'];     
			$modelPPTransactionFlow->lpr0Name0               = $data['L_PAYMENTREQUEST_0_NAME0'];     
			$modelPPTransactionFlow->lpr0Number0             = $data['L_PAYMENTREQUEST_0_NUMBER0'];     
			$modelPPTransactionFlow->lpr0Qty0                = $data['L_PAYMENTREQUEST_0_QTY0'];     
			$modelPPTransactionFlow->lpr0TaxAmt0             = $data['L_PAYMENTREQUEST_0_TAXAMT0'];     
			$modelPPTransactionFlow->lpr0Amt0                = $data['L_PAYMENTREQUEST_0_AMT0'];     
			$modelPPTransactionFlow->lpr0Desc                = $data['L_PAYMENTREQUEST_0_DESC0'];     
			$modelPPTransactionFlow->landingPage      		 = $data['LANDINGPAGE'];
		    $modelPPTransactionFlow->solutionType      		 = $data['SOLUTIONTYPE'];

			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving the transaction [storeSetExpressCheckoutRequest].');

		return $modelPPTransactionFlow->idPPTransaction;
	 }
	 
	 private function storeSetExpressCheckoutResponseSuccess($response,$idPPTransaction){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeSetExpressCheckoutResponseSuccess.');
			$modelPPTransactionFlow->token                   = urldecode($response['TOKEN']);     
			$modelPPTransactionFlow->correlationID           = urldecode($response['CORRELATIONID']);     
			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			$modelPPTransactionFlow->version                 = urldecode($response['VERSION']);     
			$modelPPTransactionFlow->build                   = urldecode($response['BUILD']);     
			$modelPPTransactionFlow->ppTimestamp             = urldecode($response['TIMESTAMP']);     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeSetExpressCheckoutResponseSuccess.');
	 }
	 
	 private function storeSetExpressCheckoutResponseFailure($response,$idPPTransaction){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	

			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeSetExpressCheckoutResponseFailure.');
			$modelPPTransactionFlow->correlationID           = urldecode($response['CORRELATIONID']);     
			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			$modelPPTransactionFlow->version                 = urldecode($response['VERSION']);     
			$modelPPTransactionFlow->build                   = urldecode($response['BUILD']);     
			$modelPPTransactionFlow->ppTimestamp             = urldecode($response['TIMESTAMP']);     

			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeSetExpressCheckoutResponseFailure.');
						
			
			$modelPPTransactionFailure= new PaypalTransactionFailure();			
			$modelPPTransactionFailure->idPPTransaction       =  $modelPPTransactionFlow->idPPTransaction;	   
			$modelPPTransactionFailure->idUser                =  $modelPPTransactionFlow->idUser;              
			$modelPPTransactionFailure->method                =  $modelPPTransactionFlow->method;             
			$modelPPTransactionFailure->correlationID         =  urldecode($response['CORRELATIONID']);       
			$modelPPTransactionFailure->ppTimestamp           =  urldecode($response['TIMESTAMP']);  
			$modelPPTransactionFailure->lErrorCode0           =  urldecode($response['L_ERRORCODE0']);
			$modelPPTransactionFailure->lShortMessage0        =  urldecode($response['L_SHORTMESSAGE0']);
			$modelPPTransactionFailure->lLongMessage0         =  urldecode($response['L_LONGMESSAGE0']);
			$modelPPTransactionFailure->lSeverityCode0        =  urldecode($response['L_SEVERITYCODE0']);
			if(!$modelPPTransactionFailure->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFailure on storeSetExpressCheckoutResponseFailure.');
	 }
	 
	 private function updateStoredSetExpressCheckOut($token, $payerid){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByAttributes(array('token'=>$token));
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Payment: something where wrong while retrieve data updateStoredSetExpressCheckOut token:'.$token);
	 		$modelPPTransactionFlow->payerID= $payerid;     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Payment: something where wrong while saving updateStoredSetExpressCheckOut token:'.$token);			     
	 }
	 
	 private function storeGetExpressCheckoutDetailsRequest($data){
			$modelPPTransactionFlow= new PaypalTransactionFlow();
			$modelPPTransactionFlow->idUser                  = Yii::app()->user->id;
			$modelPPTransactionFlow->method                  = $data['METHOD'];     
			$modelPPTransactionFlow->token                   = $data['TOKEN'];     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Payment: something where wrong while retrieve data storeGetExpressCheckoutDetailsRequest');
					return $modelPPTransactionFlow->idPPTransaction;
	 }

	 private function storeGetExpressCheckoutDetailsResponseSuccess($response,$idPPTransaction){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeSetExpressCheckoutResponseSuccess');

			$modelPPTransactionFlow->token                   = urldecode($response['TOKEN']);     
			$modelPPTransactionFlow->correlationID           = urldecode($response['CORRELATIONID']);     
			$modelPPTransactionFlow->payerID                 = urldecode($response['PAYERID']);     
			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			$modelPPTransactionFlow->version                 = urldecode($response['VERSION']);     
			$modelPPTransactionFlow->build                   = urldecode($response['BUILD']);     
			$modelPPTransactionFlow->checkOutStatus          = urldecode($response['CHECKOUTSTATUS']);     
			$modelPPTransactionFlow->ppTimestamp             = urldecode($response['TIMESTAMP']);     

			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeSetExpressCheckoutResponseSuccess');			

			$modelPPTransactionPeople = new PaypalTransactionPeople();			
			$modelPPTransactionPeople->idPPTransaction               = $modelPPTransactionFlow->idPPTransaction;
			$modelPPTransactionPeople->idUser                        = $modelPPTransactionFlow->idUser;
			$modelPPTransactionPeople->method                        = $modelPPTransactionFlow->method;
			$modelPPTransactionPeople->token                         = $modelPPTransactionFlow->token;
			$modelPPTransactionPeople->correlationID                 = $modelPPTransactionFlow->correlationID; 
			$modelPPTransactionPeople->payerID                       = urldecode($response['PAYERID']);
			$modelPPTransactionPeople->email                         = urldecode($response['EMAIL']);
			$modelPPTransactionPeople->payerstatus                   = urldecode($response['PAYERSTATUS']);
			$modelPPTransactionPeople->firstName                     = urldecode($response['FIRSTNAME']);
			$modelPPTransactionPeople->lastName                      = urldecode($response['LASTNAME']);
			$modelPPTransactionPeople->countryCode                   = urldecode($response['COUNTRYCODE']);
			$modelPPTransactionPeople->currencyCode                  = urldecode($response['CURRENCYCODE']);
			$modelPPTransactionPeople->amt                           = urldecode($response['AMT']);
			$modelPPTransactionPeople->itemAmt                       = urldecode($response['ITEMAMT']);
			$modelPPTransactionPeople->shippingAmt                   = urldecode($response['SHIPPINGAMT']);
			$modelPPTransactionPeople->handlingAmt                   = urldecode($response['HANDLINGAMT']);
			$modelPPTransactionPeople->taxAmt                        = urldecode($response['TAXAMT']);
			$modelPPTransactionPeople->desc                          = urldecode($response['DESC']);
			$modelPPTransactionPeople->notifyurl                     = urldecode($response['NOTIFYURL']);
			$modelPPTransactionPeople->insuranceAmt                  = urldecode($response['INSURANCEAMT']);
			$modelPPTransactionPeople->shipdiscAmt                   = urldecode($response['SHIPDISCAMT']);
			$modelPPTransactionPeople->lname0                        = urldecode($response['L_NAME0']);
			$modelPPTransactionPeople->lNumber0                      = urldecode($response['L_NUMBER0']);
			$modelPPTransactionPeople->lQty0                         = urldecode($response['L_QTY0']);
			$modelPPTransactionPeople->lTaxAmt0                      = urldecode($response['L_TAXAMT0']);
			$modelPPTransactionPeople->lAmt0                         = urldecode($response['L_AMT0']);
			$modelPPTransactionPeople->lDesc0                        = urldecode($response['L_DESC0']);
			$modelPPTransactionPeople->lItemWeightValue0             = urldecode($response['L_ITEMWEIGHTVALUE0']);
			$modelPPTransactionPeople->lItemLenghtValue0             = urldecode($response['L_ITEMLENGTHVALUE0']);
			$modelPPTransactionPeople->lItemWidthValue0              = urldecode($response['L_ITEMWIDTHVALUE0']);
			$modelPPTransactionPeople->lItemHeightValue0             = urldecode($response['L_ITEMHEIGHTVALUE0']);
			$modelPPTransactionPeople->lItemCategory0                = urldecode($response['L_ITEMCATEGORY0']);
			$modelPPTransactionPeople->pr0currencyCode               = urldecode($response['PAYMENTREQUEST_0_CURRENCYCODE']);
			$modelPPTransactionPeople->pr0Amt                        = urldecode($response['PAYMENTREQUEST_0_AMT']);
			$modelPPTransactionPeople->pr0ItemAmt                    = urldecode($response['PAYMENTREQUEST_0_ITEMAMT']);
			$modelPPTransactionPeople->pr0shippingAmt                = urldecode($response['PAYMENTREQUEST_0_SHIPPINGAMT']);
			$modelPPTransactionPeople->pr0handlingAmt                = urldecode($response['PAYMENTREQUEST_0_HANDLINGAMT']);
			$modelPPTransactionPeople->pr0taxAmt                     = urldecode($response['PAYMENTREQUEST_0_TAXAMT']);
			$modelPPTransactionPeople->pr0desc                       = urldecode($response['PAYMENTREQUEST_0_DESC']);
			$modelPPTransactionPeople->pr0notifyurl                  = urldecode($response['PAYMENTREQUEST_0_NOTIFYURL']);
			$modelPPTransactionPeople->pr0insuranceAmt               = urldecode($response['PAYMENTREQUEST_0_INSURANCEAMT']);
			$modelPPTransactionPeople->pr0shipDiscAmt                = urldecode($response['PAYMENTREQUEST_0_SHIPDISCAMT']);
			$modelPPTransactionPeople->pr0insuranceOptionOfferred    = urldecode($response['PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED']);
			$modelPPTransactionPeople->lpr0name0                     = urldecode($response['L_PAYMENTREQUEST_0_NAME0']);
			$modelPPTransactionPeople->lprNumber0                    = urldecode($response['L_PAYMENTREQUEST_0_NUMBER0']);
			$modelPPTransactionPeople->lprQty0                       = urldecode($response['L_PAYMENTREQUEST_0_QTY0']);
			$modelPPTransactionPeople->lprTaxAmt0                    = urldecode($response['L_PAYMENTREQUEST_0_TAXAMT0']);
			$modelPPTransactionPeople->lprAmt0                       = urldecode($response['L_PAYMENTREQUEST_0_AMT0']);
			$modelPPTransactionPeople->lprDesc0                   	 = urldecode($response['L_PAYMENTREQUEST_0_DESC0']);
			$modelPPTransactionPeople->lprItemWeightValue0           = urldecode($response['L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0']);
			$modelPPTransactionPeople->lprItemLenghtValue0           = urldecode($response['L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0']);
			$modelPPTransactionPeople->lprItemWidthValue0            = urldecode($response['L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0']);
			$modelPPTransactionPeople->lprItemHeightValue0           = urldecode($response['L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0']);
			$modelPPTransactionPeople->lprItemCategory0              = urldecode($response['L_PAYMENTREQUEST_0_ITEMCATEGORY0']);
			$modelPPTransactionPeople->pri0ErrorCode0                = urldecode($response['PAYMENTREQUESTINFO_0_ERRORCODE']);

			if(!$modelPPTransactionPeople->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionPeople on storeSetExpressCheckoutResponseSuccess');			
	 }
	 
	 private function storeGetExpressCheckoutDetailsResponseFailure($response,$idPPTransaction){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeGetExpressCheckoutDetailsResponseFailure');			

			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeGetExpressCheckoutDetailsResponseFailure');			
			
			$modelPPTransactionFailure= new PaypalTransactionFailure();			
			$modelPPTransactionFailure->idPPTransaction       =  $modelPPTransactionFlow->idPPTransaction;	   
			$modelPPTransactionFailure->idUser                =  $modelPPTransactionFlow->idUser;              
			$modelPPTransactionFailure->method                =  $modelPPTransactionFlow->method;             
			$modelPPTransactionFailure->lErrorCode0           =  urldecode($response['L_ERRORCODE0']);
			$modelPPTransactionFailure->lShortMessage0        =  urldecode($response['L_SHORTMESSAGE0']);
			$modelPPTransactionFailure->lLongMessage0         =  urldecode($response['L_LONGMESSAGE0']);
			$modelPPTransactionFailure->lSeverityCode0        =  urldecode($response['L_SEVERITYCODE0']);
			
			if(!$modelPPTransactionFailure->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFailure on storeGetExpressCheckoutDetailsResponseFailure');			
	 }

	 private function storeDoExpressCheckoutPaymentRequest($data){
			$modelPPTransactionFlow= new PaypalTransactionFlow();
			$modelPPTransactionFlow->idUser                  = Yii::app()->user->id;
			$modelPPTransactionFlow->method                  = $data['METHOD'];     
			$modelPPTransactionFlow->payerID                 = $data['PAYERID'];     
			$modelPPTransactionFlow->version                 = $data['VERSION'];     
			$modelPPTransactionFlow->pr0CurrencyCode         = $data['PAYMENTREQUEST_0_CURRENCYCODE'];     
			$modelPPTransactionFlow->pr0Amt                  = $data['PAYMENTREQUEST_0_AMT'];     
			$modelPPTransactionFlow->pr0ItemAmt              = $data['PAYMENTREQUEST_0_ITEMAMT'];     
			$modelPPTransactionFlow->pr0TaxAmt               = $data['PAYMENTREQUEST_0_TAXAMT'];     
			$modelPPTransactionFlow->pr0Desc                 = $data['PAYMENTREQUEST_0_TAXAMT'];     
			$modelPPTransactionFlow->pr0PaymentAction        = $data['PAYMENTREQUEST_0_PAYMENTACTION'];     
			$modelPPTransactionFlow->lpr0ItemCategory0       = $data['L_PAYMENTREQUEST_0_ITEMCATEGORY0'];     
			$modelPPTransactionFlow->lpr0Name0               = $data['L_PAYMENTREQUEST_0_NAME0'];     
			$modelPPTransactionFlow->lpr0Number0             = $data['L_PAYMENTREQUEST_0_NUMBER0'];     
			$modelPPTransactionFlow->lpr0Qty0                = $data['L_PAYMENTREQUEST_0_QTY0'];     
			$modelPPTransactionFlow->lpr0TaxAmt0             = $data['L_PAYMENTREQUEST_0_TAXAMT0'];     
			$modelPPTransactionFlow->lpr0Amt0                = $data['L_PAYMENTREQUEST_0_AMT0'];     
			$modelPPTransactionFlow->lpr0Desc                = $data['L_PAYMENTREQUEST_0_DESC0'];     

			if(!$modelPPTransactionFlow->save())
					throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeDoExpressCheckoutPaymentRequest');			
		return $modelPPTransactionFlow->idPPTransaction;
	 }

	 private function storeDoExpressCheckoutPaymentResponseSuccess($response,$idPPTransaction, $payerid){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeDoExpressCheckoutPaymentResponseSuccess');			
			
			$modelPPTransactionFlow->token                   = urldecode($response['TOKEN']);     
			$modelPPTransactionFlow->correlationID           = urldecode($response['CORRELATIONID']);     
			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			$modelPPTransactionFlow->version                 = urldecode($response['VERSION']);     
			$modelPPTransactionFlow->build                   = urldecode($response['BUILD']);     
			$modelPPTransactionFlow->ppTimestamp             = urldecode($response['TIMESTAMP']);     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeDoExpressCheckoutPaymentResponseSuccess');			

			$modelPPTransactionFinal = new PaypalTransactionFinal();
			$modelPPTransactionFinal->idPPTransaction                    =  $modelPPTransactionFlow->idPPTransaction; 
			$modelPPTransactionFinal->idUser                             =  $modelPPTransactionFlow->idUser;          
			$modelPPTransactionFinal->method                             =  $modelPPTransactionFlow->method;          
			$modelPPTransactionFinal->token                              =  urldecode($response['TOKEN']);            
			$modelPPTransactionFinal->correlationID                      =  urldecode($response['CORRELATIONID']);
			$modelPPTransactionFinal->payerID                         	 =  $payerid; 
			$modelPPTransactionFinal->ack                                =  urldecode($response['ACK']); 
			$modelPPTransactionFinal->successPageRedirectRequested       =  urldecode($response['SUCCESSPAGEREDIRECTREQUESTED']); 
			$modelPPTransactionFinal->ppTimestamp                        =  urldecode($response['TIMESTAMP']); 
			$modelPPTransactionFinal->version                            =  urldecode($response['VERSION']); 
			$modelPPTransactionFinal->build                              =  urldecode($response['BUILD']); 
			$modelPPTransactionFinal->insuranceOptionSelected            =  urldecode($response['INSURANCEOPTIONSELECTED']); 
			$modelPPTransactionFinal->shoppingOptionIsDefault            =  urldecode($response['SHIPPINGOPTIONISDEFAULT']); 
			$modelPPTransactionFinal->pi0TransactionID                   =  urldecode($response['PAYMENTINFO_0_TRANSACTIONID']); 
			$modelPPTransactionFinal->pi0TransactionType                 =  urldecode($response['PAYMENTINFO_0_TRANSACTIONTYPE']); 
			$modelPPTransactionFinal->pi0PaymentType                     =  urldecode($response['PAYMENTINFO_0_PAYMENTTYPE']); 
			$modelPPTransactionFinal->pi0OrderType                       =  urldecode($response['PAYMENTINFO_0_ORDERTIME']); 
			$modelPPTransactionFinal->pi0Amt                             =  urldecode($response['PAYMENTINFO_0_AMT']); 
			$modelPPTransactionFinal->pi0TaxAmt                          =  urldecode($response['PAYMENTINFO_0_TAXAMT']); 
			$modelPPTransactionFinal->pi0CurrencyCode                    =  urldecode($response['PAYMENTINFO_0_CURRENCYCODE']); 
			$modelPPTransactionFinal->pi0PaymentStatus                   =  urldecode($response['PAYMENTINFO_0_PAYMENTSTATUS']); 
			$modelPPTransactionFinal->pi0PendingReason                   =  urldecode($response['PAYMENTINFO_0_PENDINGREASON']); 
			$modelPPTransactionFinal->pi0ReasonCode                      =  urldecode($response['PAYMENTINFO_0_REASONCODE']); 
			$modelPPTransactionFinal->pi0ProtectionElegibility           =  urldecode($response['PAYMENTINFO_0_PROTECTIONELIGIBILITY']); 
			$modelPPTransactionFinal->pi0ProtectionElegibilityType       =  urldecode($response['PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE']); 
			$modelPPTransactionFinal->pi0SecureMerchantAccountID         =  urldecode($response['PAYMENTINFO_0_SECUREMERCHANTACCOUNTID']); 
			$modelPPTransactionFinal->pi0ErrorCode                       =  urldecode($response['PAYMENTINFO_0_ERRORCODE']); 
			$modelPPTransactionFinal->pi0Ack                             =  urldecode($response['PAYMENTINFO_0_ACK']); 
			if(!$modelPPTransactionFinal->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFinal on storeDoExpressCheckoutPaymentResponseSuccess');			
	 }
	 
	 private function storeDoExpressCheckoutPaymentResponseFailure($response,$idPPTransaction){
			$modelPPTransactionFlow=PaypalTransactionFlow::model()->findByPk($idPPTransaction);	
			if($modelPPTransactionFlow===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFlow on storeDoExpressCheckoutPaymentResponseSuccess');			

			$modelPPTransactionFlow->ack                     = urldecode($response['ACK']);     
			$modelPPTransactionFlow->version                 = urldecode($response['VERSION']);     
			$modelPPTransactionFlow->build                   = urldecode($response['BUILD']);     
			if(!$modelPPTransactionFlow->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFlow on storeDoExpressCheckoutPaymentResponseSuccess');			
			
			$modelPPTransactionFailure= new PaypalTransactionFailure();			
			$modelPPTransactionFailure->idPPTransaction       =  $modelPPTransactionFlow->idPPTransaction;	   
			$modelPPTransactionFailure->idUser                =  $modelPPTransactionFlow->idUser;              
			$modelPPTransactionFailure->method                =  $modelPPTransactionFlow->method;             
			$modelPPTransactionFailure->correlationID         =  urldecode($response['CORRELATIONID']);       
			$modelPPTransactionFailure->ppTimestamp           =  urldecode($response['TIMESTAMP']);   
			$modelPPTransactionFailure->lErrorCode0           =  urldecode($response['L_ERRORCODE0']);
			$modelPPTransactionFailure->lShortMessage0        =  urldecode($response['L_SHORTMESSAGE0']);
			$modelPPTransactionFailure->lLongMessage0         =  urldecode($response['L_LONGMESSAGE0']);
			$modelPPTransactionFailure->lSeverityCode0        =  urldecode($response['L_SEVERITYCODE0']);
			
			if(!$modelPPTransactionFailure->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalTransactionFailure on storeDoExpressCheckoutPaymentResponseSuccess');			
	 }

	 private function storeCorrectGSPTransactionIntegrationIncrementUserCredits($idPPTransaction){
			$modelPPTransactionFinal=PaypalTransactionFinal::model()->findByPk($idPPTransaction);
			if($modelPPTransactionFinal===null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalTransactionFinal on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
						
			$modelTransaction = new Transaction();
			$modelTransaction->idTransactionType      =	   3; 
			$modelTransaction->idUser                 =    $modelPPTransactionFinal->idUser;
			$modelTransaction->price                  =    $modelPPTransactionFinal->pi0Amt;
			$modelTransaction->credits                  =    $modelPPTransactionFinal->pi0Amt;

			if(!$modelTransaction->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving Transaction on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
						
			$modelPpGspIntegration=PaypalGspIntegration::model()->findByPk($modelPPTransactionFinal->token);
			if($modelPpGspIntegration==null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving PaypalGspIntegration on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
						
			$modelPpGspIntegration->idTransaction        	= $modelTransaction->idTransaction;
			$modelPpGspIntegration->payerID               	= $modelPPTransactionFinal->payerID;   
			$modelPpGspIntegration->pi0Amt     		   		= $modelPPTransactionFinal->pi0Amt;     
			if(!$modelPpGspIntegration->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalGspIntegration on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
						
			$modelUser=User::model()->findByPk($modelPPTransactionFinal->idUser);
			if($modelUser==null)
				throw new CHttpException(404,'Buy credits: something went wrong while retrieving User on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
					
			//Verifico se ha acquistato una pacchetto oppure attraverso il carrello
			// Se -1 è un carrello altrimenti il numero di crediti è dato idCreditsPacket;
			if($modelPpGspIntegration->idCreditsPacket==-1)   
				$creditsNowBought = $modelPpGspIntegration->pi0Amt; 
			else
				$creditsNowBought = $modelPpGspIntegration->idCreditsPacket;
				
			$modelUser->creditsBought += $creditsNowBought;
			if(!$modelUser->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving User on storeCorrectGSPTransactionIntegrationIncrementUserCredits');			
	 }

	 private function storeTransactionInterrupted($token){
	 	try{
			$transaction = Yii::app()->db->beginTransaction();
			$modelPPTransactionFlow= new PaypalTransactionFlow();
			$modelPPTransactionFlow->idUser                  = Yii::app()->user->id;
			$modelPPTransactionFlow->method                  = 'TransactionInterrupted';     
			$modelPPTransactionFlow->token                   = $token;     

			if(!$modelPPTransactionFlow->save())
			         $this->gspLog("error","storeTransactionInterrupted: modelPPTransactionFlow->save();"); 
				
			$modelPPTransactionFailure= new PaypalTransactionFailure();			
			$modelPPTransactionFailure->idPPTransaction       =  $modelPPTransactionFlow->idPPTransaction;	   
			$modelPPTransactionFailure->idUser                =  $modelPPTransactionFlow->idUser;              
			$modelPPTransactionFailure->method                =  $modelPPTransactionFlow->method;             
			$modelPPTransactionFailure->token                 =  $modelPPTransactionFlow->token;               
			
			if(!$modelPPTransactionFailure->save())
			         $this->gspLog("error","storeTransactionInterrupted: modelPPTransactionFailure->save();"); 
			$transaction->commit();
		}
		catch(Exception $e){ // an exception is raised if a query fails
			$transaction->rollBack();
			throw new CHttpException(404,'Transaction error. ');
		}
		return $modelPPTransactionFlow->idPPTransaction;
	 }

	 private function storePaypalGspIntegration($response, $idCreditsPacket, $creditsCount){
			$modelPpGspIntegration= new PaypalGspIntegration();
			$modelPpGspIntegration->token                   = urldecode($response['TOKEN']);     
			$modelPpGspIntegration->idCreditsPacket         = $idCreditsPacket; // è -1 nel caso in cui sia una vendita da carrello    
			$modelPpGspIntegration->idUser                  = Yii::app()->user->id;
			$modelPpGspIntegration->pi0Amt     		   		= $creditsCount;     
			if(!$modelPpGspIntegration->save())
				throw new CHttpException(404,'Buy credits: something went wrong while saving PaypalGspIntegration on storePaypalGspIntegration.');
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
			throw new CHttpException(404,'The requested user does not exist.');
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

