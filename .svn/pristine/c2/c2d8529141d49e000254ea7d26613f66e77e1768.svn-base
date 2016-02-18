<?php

class CronJobController extends Controller
{
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
//			array('allow', 
//				'actions'=>array('test',''),
//				
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
		);
	}

	public function actionTest()
	{
			$this->gspLog("info","Dentro-Test ".$this->route);
			echo "ciao";
	}
	
	
	
	public function actionAutompletContentApproval()
	{
			
			$parameter = ConfParameters::model()->findByPk('RepeatedWordsCountForApproval');
			$count = intval($parameter->value);
			

			//Ripetere la parte di codice sottostante  per altri tipi di dati 
			
		// START Dictionary
			$criteria=new CDbCriteria;
			$criteria->condition='fromUser=1';
			$criteria->select='keyword';
			//$criteria->group='keyword';
			//$criteria->having='count >:count';
			//$criteria->params=array(':count'=>$count);
			$dictionary=Dictionary::model()->findAll($criteria);
			
			
			if(count($dictionary)>0){
				echo "trovate chiavi da aggiungere ".count($dictionary);
			}else{
				echo "Non trovata alcuna chiave da aggiungere";
			}
			
		//END Dictionary
			 
	}

	public function actionRefreshSubmitBonus()
	{
			 
	}

	
}


