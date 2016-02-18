<?php
 
class UserInfo extends CWidget{
	
	var $idUser;
	var $showOuter=true;
	var $class="right-panel";
	
    public function run(){
		$modelUser=User::model()->findByPk($this->idUser);
		
		$this->render('userInfo', array(
        	'showOuter'=>$this->showOuter,
        	'class'=>$this->class,
			'model'=>$modelUser,
		));
    }
}