<?php

class MobileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mobile';
	
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('home'), 
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('home','logout','takePhoto','uploadPhoto'), 
				'users'=>array('@'),
			),*/
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('home','login'), 
				'users'=>array('guest'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('home'),
				'roles'=>array('admin', 'guest'), //NOTE: better using roles than the hard coded form  'users'=>array('?'),
			),
		
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('home'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('home' ),
				'roles'=>array('admin', 'authenticated'), //FIXME: AG update/vew only if  user is authenticated and id is the right one!
			),*/
			array('deny',  // deny all users
			//	'actions'=>array('home','logout','takePhoto','uploadPhoto', // user @ 
			//					'login', // user guest
			//					),
				'users'=>array('*'),
			),
		);
	}

	public function actionHome(){
		 	
		$this->render('home',array(
				
		));
	}	
	
	public function actionlogin(){
		
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
			if($model->validate() && $model->loginGSP())
				$this->redirect(array('mobile/home'));
		}
			
		$this->render('login',array('model'=>$model));
	}	
	

	public function actionTakePhoto(){
		$this->render('takePhoto');
	}
	
	public $onloadFunctions;
	public function actionUploadPhoto(){

		$modelPhotoMobile = new PhotoMobileForm();
		
		if(isset($_POST['PhotoMobileForm'])){
			//Form Fields Validation
			if($_POST['PhotoMobileForm']['title']=="")
				$formValidation['title'] = "Title is not edit.";
			  
			//if($_POST['PhotoMobileForm']['image']=="")
			$img = CUploadedFile::getInstance($modelPhotoMobile,'image'); 
			if($img == null)
				 $formValidation['image'] = "Image is not selected.";
				 //  throw new CHttpException(404,'image');
						
			if($_POST['PhotoMobileForm']['idCategory1']=="")
				 $formValidation['idCategory1'] = "Category is not selected.";
			 	 //  throw new CHttpException(404,'idCategory1');
			if($_POST['PhotoMobileForm']['lat']=="" || $_POST['PhotoMobileForm']['lng']=="")
				 $formValidation['coordinate'] = "Location is not selected.";
			 	 //  throw new CHttpException(404,'latlng');
				   
			if(isset($formValidation)){
				$this->render('uploadPhotoUnvalidForm',array(
					'formValidation' => $formValidation,
				));
				Yii::app()->end();
			}else{
				$transaction = Yii::app()->db->beginTransaction();
				try{
				    $modelProductPrePost = new ProductPrePost();
					$modelProductPrePost->title=$_POST['PhotoMobileForm']['title'];
					$modelProductPrePost->idProductStatus=3; //Approved
					$modelProductPrePost->idUser= Yii::app()->user->id;
					
					if(!$modelProductPrePost->save())
					    throw new CHttpException(404,'Mobile uploadphoto: something went wrong while saving the product pre post #');
					
					
					if(isset($_POST['PhotoMobileForm']['image'])){
						if($img = CUploadedFile::getInstance($modelPhotoMobile,'image')){
							//throw new CHttpException(404,'ENTER SAVING FILE FUNCTION');
							$idProduct=$modelProductPrePost->idProduct;
							$file=dirname(Yii::app()->request->scriptFile) . '/photos/' . $idProduct . '.jpg';
							if(!$img->saveAs($file))
								throw new CHttpException(404, 'Upload photo: '.$img->getError().' [#'.$idProduct.']');
							//I do not why I need to reload the model
							$modelProductPp=$this->loadModel($idProduct);
							$modelProductPp->saveUploadedPhoto($file);
							//if(Yii::app()->controller->saveUploadedPhoto($file, $modelProductPrePost)!=0)
								//throw new CHttpException(404, 'Upload photo: something went wrong while saving the file #'.$idProduct);
							
							list($width, $height) = getimagesize($file, $info);
							$ratio=$width/$height;
							if(!$ratio)
								throw new CHttpException(404,'Photo upload: division by zero in ratio of photo #'.$lastKey);
							if($ratio>1)
								$maxSize=$width;
							else
							$maxSize=$height;
						}
					}
					
					//throw new CHttpException(404,$_POST['PhotoMobileForm']['title'].'-'.$_POST['PhotoMobileForm']['idCategory1'].'-'.$_POST['PhotoMobileForm']['lat'].'-'.$_POST['PhotoMobileForm']['lng']);
					$modelProduct = new Product();
					$modelProduct->attributes = $modelProductPp->attributes;
					if(!$modelProduct->save())
					    throw new CHttpException(404,'Mobile uploadphoto: something went wrong while saving the product #');
									
					$modelPhotoPrePost = PhotoPrePost::model()->findByPk($modelProductPrePost->idProduct);
					$modelPhotoPrePost->idCategory1=$_POST['PhotoMobileForm']['idCategory1'];
					$modelPhotoPrePost->lat=$_POST['PhotoMobileForm']['lat'];
					$modelPhotoPrePost->lng=$_POST['PhotoMobileForm']['lng'];
					$modelPhotoPrePost->idPhotoType=2; //BreakingNews
					$modelPhotoPrePost->isExclusive=0; 
					$modelPhotoPrePost->ratio=$ratio;
					$modelPhotoPrePost->maxSize=$maxSize;
					if(!$modelPhotoPrePost->save())
					    throw new CHttpException(404,'Mobile uploadphoto: something went wrong while saving the product pre post #');
					
					$modelPhoto = new Photo();
					$modelPhoto->attributes = $modelPhotoPrePost->attributes;
					if(!$modelPhoto->save())
					    throw new CHttpException(404,'Mobile uploadphoto: something went wrong while saving the photo #');
					
				    $transaction->commit();
					
					$this->render('uploadPhotoOK');
				}
				catch(Exception $e){
					// echo print_r($e);
				    $transaction->rollBack();
				    throw $e;
				}
			}
		}
		
		$criteria=new CDbCriteria;
		$criteria->condition='idPhotoType=2';
		$categories=ConfCategory::model()->findAll($criteria);		


		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utility.js', CClientScript::POS_HEAD);
		$cs->registerCoreScript('jquery');
		
		$this->render('uploadPhoto',array(
				'modelPhotoMobile' => $modelPhotoMobile,
				'categories'=>$categories
		));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('mobile/home'));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='uploadmobile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

