<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_idUser;
	const ERROR_USERNAME_NOT_VERIFIED=3;
	const ERROR_USERNAME_IS_DELETED=4;
	const ERROR_FB_USER_NOT_FOUND=5;
	const ERROR_USER_SWITCH_NOT_AUTHORIZED=6;

	
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticateGSP(){
		$criteria=new CDbCriteria;
		$criteria->select='idUser, username, password, challenge, idUserStatus, idUserProfile';
		$criteria->condition='(username=:username or email=:email) AND challenge=:challenge';
		$criteria->params=array(':username'=>$this->username, ':email'=>$this->username,':challenge'=>$this->challenge);
		
		$user = User::model()->find($criteria);

		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		
		else if(!$user->validatePassword($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else{ 
			if($user->idUserStatus==2){
				$util = new Util();
				$user->lastLogin_timestamp = $util->getCurrentTime(); 
				$user->save();

				$this->_idUser = $user->idUser;
				$this->username= $user->username;
				$this->errorCode=self::ERROR_NONE;
			}else{
				if($user->idUserStatus==4){
					$this->errorCode=self::ERROR_USERNAME_IS_DELETED;
				}else{
					$this->errorCode=self::ERROR_USERNAME_NOT_VERIFIED;
				}
			}
		}
		return !$this->errorCode;
	}
	

	public function authenticateFbUser()
	{
		$user  = User::model()->find('fbUserId=:fbUserId', array(':fbUserId'=>$this->fbUserId));
		
		if($user===null)
			$this->errorCode=self::ERROR_FB_USER_NOT_FOUND;
		
		else
		{ 
			if($user->idUserStatus==2){
				$util = new Util();
				$user->lastLogin_timestamp = $util->getCurrentTime(); 
				$user->save();

				$this->_idUser = $user->idUser;
				$this->username= $user->username;
				$this->errorCode=self::ERROR_NONE;
				
			}else{
				if($user->idUserStatus==4){
					$this->errorCode=self::ERROR_USERNAME_IS_DELETED;
				}else{
					$this->errorCode=self::ERROR_USERNAME_NOT_VERIFIED;
				}
			}
		}			
		
		return !$this->errorCode;
	}
	
	public function authenticateSwitchUser($idUserMaster,$idUserSlave)
	{
		//TODO Verifico se  esiste la relazione su tbl_own_switch_user
		$user  = User::model()->find('idUser=:idUser', array(':idUser'=>$idUserSlave));
		$ownSwitchUser  = OwnSwitchUser::model()->find('idUserMaster=:idUserMaster and idUserSlave=:idUserSlave', 
												array(':idUserMaster'=>$idUserMaster,':idUserSlave'=>$idUserSlave));
		
		
		if($ownSwitchUser===null)
			$this->errorCode=self::ERROR_USER_SWITCH_NOT_AUTHORIZED;
		else
		{
			if($user->idUserStatus==2){
				
				$util = new Util();
				$user->lastLogin_timestamp = $util->getCurrentTime(); 
				$user->save();
				
				Yii::app()->session['idUserMaster'] = $idUserMaster;
				$this->_idUser = $user->idUser;
				$this->username= $user->username;
				$this->errorCode=self::ERROR_NONE;
			}else{
				if($user->idUserStatus==4){
					$this->errorCode=self::ERROR_USERNAME_IS_DELETED;
				}else{
					$this->errorCode=self::ERROR_USERNAME_NOT_VERIFIED;
				}
			}
		}			
		
		return !$this->errorCode;
	}
	
	
	/* Returns the userID taken from the database
	 * * @return integer the userID
	 * 
	 */
	public function getId(){
        return $this->_idUser;
    }
    
}
