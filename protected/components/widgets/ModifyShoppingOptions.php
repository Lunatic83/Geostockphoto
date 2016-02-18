<?php
 
class ModifyShoppingOptions extends CWidget
{
	var $modelProductPp;
	var $form;
	var $shoppingOptMan;
	var $shoppingOptManRm;
	var $maxSize;
	
	var $modelShoppingType;
	var $fieldShoppingType;
	
	var $save=true;
	
    public function run(){
		// *************************************************************
		// SIZE AND LICENSES
		$criteria=new CDbCriteria;
		if(isset($this->maxSize)){
			$criteria->condition='maxSize<='.$this->maxSize.' or maxSize is null';
			$sizes=ConfSize::model()->findAll($criteria);
		}else 
			$sizes=ConfSize::model()->findAll();
		$criteria->condition='idSize=0';
		$sizesRM=ConfSize::model()->findAll($criteria);
			
		if(count($sizes)==0)
			throw new CHttpException(404, 'Edit photo: the maximum size of the photos selected is resulting less than XS.');

		$criteria->condition='licenseType=\'RF\'';
		$licensesRF=ConfLicense::model()->findAll($criteria);

		$licensesRM=ConfLicenseRmType::model()->findAll();

		$criteria->condition='idDuration=1';
		$durationRm=ConfDurationRm::model()->findAll($criteria);

		$criteria->condition='';
		$criteria->select='licenseType';
		$criteria->distinct=true;
		$licenseType=ConfLicense::model()->findAll($criteria);
		// END SIZE AND LICENSES
		// *************************************************************
		
    	$this->render('modifyShoppingOptions',
    		array('form'=>$this->form,
    			'model'=>$this->modelProductPp,
    			'shoppingOptMan'=>$this->shoppingOptMan,
    			'shoppingOptManRm'=>$this->shoppingOptManRm,
    			'licenseType'=>$licenseType,
    			'modelShoppingType'=>$this->modelShoppingType,
    			'fieldShoppingType'=>$this->fieldShoppingType,
				'sizes'=>$sizes,
    			'sizesRM'=>$sizesRM,
				'licenses'=>$licensesRF,
				'licensesRM'=>$licensesRM,
				'durationRm'=>$durationRm,
    			'save'=>$this->save
    		)
    	);
    }
}