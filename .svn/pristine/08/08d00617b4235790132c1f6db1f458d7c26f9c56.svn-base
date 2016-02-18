<?php

/**
 */
class ConvertCreditsForm extends CFormModel
{
	public $credits;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('credits', 'numerical'),
			array('credits', 'positiveNumber'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	/**
	 * Implements credits field validator rule
	 */
	public function positiveNumber($attribute,$params)
	{
		$c = $_POST['ConvertCreditsForm']['credits'];
		//$cur_cred = $_POST['ConvertCreditsForm']['current_credits'];
		$parameter = ConfParameters::model()->findByPk('PayoutThreshold');
		
		$modelUser=$this->loadUserModel(Yii::app()->user->id);
		$cur_cred=$modelUser->creditsEarned;
		if($c<intval($parameter->value))
			$this->addError($attribute, 'The requested credits must be more than '.intval($parameter->value).' credits');
		else
			if($c>$cur_cred)
				$this->addError($attribute, 'The requested credits must be less or equal your actual credits');
		
	}
	
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadUserModel($id)
	{
		$model=User::model()->findByPk($id);	
		if($model===null)
			throw new CHttpException(404,'The requested user does not exist.');
		return $model;
	}
	
	public function onBeforeSave(){

	}

	public function onAfterSave(){

	}

	public function onBeforeDelete(){

	}

	public function onAfterDelete(){

	}

	public function onBeforeFind(){

	}

	public function onAfterFind(){

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
