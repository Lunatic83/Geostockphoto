<?php

class UserPilotController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/operative';
	public $pageName="";
	public $onloadFunctions;
	public $idPhotoType;
	public $user;

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
				'actions'=>array('index','view'),
				'expression'=>'$user->isAdministrator()',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'expression'=>'$user->isAdministrator()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','sendMsg'),
				'expression'=>'$user->isAdministrator()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionSendMsg($max=10){
		$criteria=new CDbCriteria;
		$criteria->condition="msgSent=0 and contact is not null and idUser is null";
		$criteria->limit=$max;
		$userPilot=UserPilot::model()->findAll($criteria);
		
		for($i=0; $i<count($userPilot); $i++){
			$message = new YiiMailMessage;
			if($userPilot[$i]->language=='ITA'){
				$message->view = 'userPilotITA3';
				if($userPilot[$i]->freeCredits>0)
					$message->setSubject('Foto gratis');
				else
					$message->setSubject('Foto in vendita');
			}else{
				$message->view = 'userPilotEN3';
				if($userPilot[$i]->freeCredits>0)
					$message->setSubject('Free Photos');
				else
					$message->setSubject('Photos on sale');
			}
			$message->setBody(array('modelUser'=>$userPilot[$i]), 'text/html');
			$message->addTo($userPilot[$i]->contact);
			$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
			Yii::app()->mail->send($message);
			
			$userPilot[$i]->msgSent=1;
			if(!$userPilot[$i]->save())
				throw new CHttpException(404,'Error while saving model.');
				
			echo ($i+1).") Email sent to ".$userPilot[$i]->contact."<br>";
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserPilot;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserPilot'])){
			$model->attributes=$_POST['UserPilot'];
			$model->verCode=$this->randomString(32);
			if($model->save())
				$this->redirect(array('view','id'=>$model->idUserPilot));
		}

		$model->language='EN';
		$model->msgSent=0;
		$model->freeCredits=0;
		$this->render('create',array(
			'model'=>$model,
		));
	}
	private function randomString($length) {
		$key="";
	    $keys = array_merge(range(0,9), range('a', 'z'), range('A','Z'));
	    for($i=0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserPilot']))
		{
			$model->attributes=$_POST['UserPilot'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idUserPilot));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserPilot');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserPilot('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserPilot']))
			$model->attributes=$_GET['UserPilot'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=UserPilot::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-pilot-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
