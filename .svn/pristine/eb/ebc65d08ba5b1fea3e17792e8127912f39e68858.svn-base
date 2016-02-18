<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $challenge;
	public $rememberMe;
	public $usernamereal;
	public $hiddenpassword;
		
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password,challenge,usernamereal,hiddenpassword', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password,challenge,usernamereal,hiddenpassword', 'authenticateGSP'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticateGSP($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->hiddenpassword, $this->challenge,null);
			if(!$this->_identity->authenticateGSP())
				//$this->addError('password','Incorrect username or password.');
				
				switch($this->_identity->errorCode)
				{
    				case UserIdentity::ERROR_NONE:
        				Yii::app()->user->login();
        				break;
    				case UserIdentity::ERROR_USERNAME_INVALID:
        				$this->addError('username','Username is incorrect.');
        				break;
					case UserIdentity::ERROR_USERNAME_NOT_VERIFIED:
        				$this->addError('username','Username is not verified yet, please check your email.');
        				break;
					case UserIdentity::ERROR_USERNAME_IS_DELETED:
        				$this->addError('username','Your Account is deleted');
        				break;						
    				default: // UserIdentity::ERROR_PASSWORD_INVALID
        				$this->addError('password','Password is incorrect.');
        				break;
				}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function loginGSP()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->hiddenpassword);
			$this->_identity->authenticateGSP();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
		/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function loginFb()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->hiddenpassword);
			$this->_identity->authenticateGSP();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
		/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function switchUser($idUser)
	{
		if($this->_identity===null)
		{	
			$this->_identity=new UserIdentity(null,null,null,null);
			$this->_identity->authenticateSwitchUser(Yii::app()->user->id,$idUser);
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->switchUser($this->_identity,$duration);
			return true;
		}
		else 
			return false;
		/*if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;*/
	}
	
}
