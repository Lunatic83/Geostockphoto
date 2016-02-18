<?php

class GSPWebUser extends CWebUser{
 
    protected $_model;
    
	public function getUsername(){
        $user = $this->loadUser();
        return $user->username;
    }
	
	public function getIdProfile(){
        $user = $this->loadUser();
        return $user->idUserProfile;
    }
	
	public function getWeightRW(){
        $user = $this->loadUser();
        return $user->idUserProfile0->weight_review;
    }

	public function getIdProfileColl(){
        $user = $this->loadUser();
		if($user->idUserProfile==2)
			return 3;
		if($user->idUserProfile==3)
			return 2;
		if($user->idUserProfile==4)
			return 5;
		if($user->idUserProfile==5)
			return 4;
		return 0;
    }
 
 	function isAdministrator(){
        $user = $this->loadUser();
        if ($user)
           return $user->idUserProfile==1; //UserProfileLookUp::ADMIN;
        return false;
    }
 
 	function getApiKey(){
        $user = $this->loadUser();
        if($user)
        	if(isset($user->apiKey))
				return $user->apiKey->apiKey;
        return false;
    }
 
    function isUser(){
        $user = $this->loadUser();
        if ($user)
           return $user->idUserProfile==2; //UserProfileLookUp::USER;
        
        return false;
    }
	
    function isNewbiePhotographer(){
        $user = $this->loadUser();
        if ($user)
           return $user->idUserProfile==3; //UserProfileLookUp::NEWBIE_PHOTOGRAPHER;
        return false;
    }	
 
    function isProfessionalPhotographer(){
        $user = $this->loadUser();
        if ($user)
           return $user->idUserProfile==4; //UserProfileLookUp::PROFESSIONAL_PHOTOGRAPHER;
        return false;
    }
	
	function isUserAtLeast(){
		if($this->isUser())
			return true;
		else if($this->isNewbiePhotographerAtLeast())
			return true;
		else
			return false;
	}
	
	function isNewbiePhotographerAtLeast(){
		if($this->isNewbiePhotographer())
			return true;
		else if($this->isProfessionalPhotographerAtLeast())
			return true;
		else
			return false;
	}
	
	function isProfessionalPhotographerAtLeast(){
		if($this->isProfessionalPhotographer())
			return true;
		else if($this->isAdministrator())
			return true;
		else
			return false;
	}

	function isRoleAdmin($idUserSlave=null){
		$slaveCondition="";
		if($idUserSlave!=null){
			$slaveCondition="and idUserSlave=".$idUserSlave;
		}
		
		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster='.$this->id.' and idRole=1 '.$slaveCondition; //1 Admin
		
		return OwnSwitchUser::model()->exists($criteria);		
	}
	
	function afterLogin($fromCookie){
		if($fromCookie && $this->allowAutoLogin){
			$this->setSecureSessionId();
			return true;
		}
	}

	function setSecureSessionId(){
		if(Yii::app()->user->isGuest)
			throw new CHttpException(404, 'You are not logged in.');
			
		$sessionIdSecure=$this->randomString(32);
		$cookie = new CHttpCookie('PHPSESSID_SECURE', $sessionIdSecure);
		if(Yii::app()->getParams()->environment!="local")
			$cookie->secure=true;
		Yii::app()->request->cookies['PHPSESSID_SECURE'] = $cookie;
		
		$modelUser=User::model()->findByPk(Yii::app()->user->id);
		if($modelUser===null)
			throw new CHttpException(404, 'The requested user does not exist.');
			
		$modelUser->sessionIdSecure=$sessionIdSecure;
		if(!$modelUser->save())
			throw new CHttpException(404, 'Something went wrong while saving the secure session id.');
	}
	
	private function randomString($length) {
		$key="";
	    $keys = array_merge(range(0,9), range('a', 'z'), range('A','Z'));
	    for($i=0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}

	function isRoleEditor($idUserSlave=null){
		$slaveCondition="";
		if($idUserSlave!=null){
			$slaveCondition="and idUserSlave=".$idUserSlave;
		}
		
		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster='.$this->id.' and idRole=2 '.$slaveCondition ; //2 Editor
		return OwnSwitchUser::model()->exists($criteria);		
	}
	
	public function switchUser($identity,$duration=0)
	{
		$id=$identity->getId();
		$states=$identity->getPersistentStates();
		if($this->beforeLogin($id,$states,false))
		{
			$this->changeIdentity($id,$identity->getName(),$states);
			if($duration>0)
			{
				if($this->allowAutoLogin){
					$this->saveToCookie($duration);
				}else
					throw new CException(Yii::t('yii','{class}.allowAutoLogin must be set true in order to use cookie-based authentication.',
						array('{class}'=>get_class($this))));
			}

			$this->afterLogin(false);
		}
	}

    // Load user model.
    protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model;
    }
}