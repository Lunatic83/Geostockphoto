<?php
 
class ProductSearch extends CWidget
{
	var $idPhotoType;
	var $user;
	
    public function run(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/rating.js', CClientScript::POS_HEAD);
		
		$criteria=new CDbCriteria;
		$criteria->condition='idPhotoType=:idPhotoType';
		$criteria->params=array(':idPhotoType'=>$this->idPhotoType);
		$categories=ConfCategory::model()->findAll($criteria);
		
		$size=ConfSize::model()->findAll();
		
		$license=ConfLicense::model()->findAll();
		
        $this->render('productSearch', array(
				'categories'=>$categories,
				'size'=>$size,
				'license'=>$license,
				'user'=>$this->user,
				'idPhotoType'=>$this->idPhotoType
		));
    }
}