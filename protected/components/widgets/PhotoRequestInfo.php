<?php
 
class PhotoRequestInfo extends CWidget{
	
	var $idPhotoRequest;
	var $showOuter=true;
	var $class="right-panel";
	
    public function run(){
		$modelPhotoRequest=PhotoRequest::model()->findByPk($this->idPhotoRequest);
		
		$this->render('photoRequestInfo', array(
        	'showOuter'=>$this->showOuter,
        	'class'=>$this->class,
			'model'=>$modelPhotoRequest,
		));
    }
}