<?php
class RbacCommand extends CConsoleCommand 
{ 
	
	private $_authManager; 
	public function run($args) 
	{

		//ensure that an authManager is defined as this is mandatory 
		//for creating an auth hierarchy 
        if(($this->_authManager=Yii::app()->authManager)===null) 
		{
			echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n"; 
      			echo "If you already added 'authManager' component in application configuration,\n";
			echo "please quit and re-enter the yiic shell.\n"; 
            			return; 
        } 
 
		$this->_authManager->clearAll();

		$bizRule='return Yii::app()->user->id==$params["photographer"]->idUser;';
		$this->_authManager->createOperation("updatePhotographer", "modify photographer profile", $bizRule);
		$role=$this->_authManager->createRole('newbie', 'newbie photographer');
		$role->addChild("updatePhotographer");

		$this->_authManager->createOperation("makeReview", "make a review");
		$role=$this->_authManager->createRole('professional', 'professional photographer');
		$role->addChild("makeReview");

		$bizRule='return !Yii::app()->user->isGuest;';
		$this->_authManager->createRole('authenticated', 'authenticated user', $bizRule);

		$bizRule='return Yii::app()->user->isGuest;';
		$this->_authManager->createRole('guest', 'guest user', $bizRule);

		//TODO: operazioni admin?
		$role=$this->_authManager->createRole('admin');
		$role->addChild("guest");
		$role->addChild("authenticated");
		$role->addChild("newbie");
		$role->addChild("professional");


		$this->_authManager->assign("admin", 1);

		$this->_authManager->save();

      	
		//provide a message indicating success 
       	echo "Authorization hierarchy successfully generated.";

	}
}
