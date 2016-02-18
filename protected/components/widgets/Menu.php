<?php
 
class Menu extends CWidget
{
	
    public function run()
    {
    	if(Yii::app()->user->isGuest){
    		$cs=Yii::app()->clientScript;
			$cs->registerScriptFile('http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/sha512.js', CClientScript::POS_HEAD);
			$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/site/challenge-login.js', CClientScript::POS_HEAD);
			
			Yii::import('application.extensions.fbconnect.*'); 

			$appId = ConfParameters::model()->findByPk('FbAppId')->value;
			$secret = ConfParameters::model()->findByPk('FbSecret')->value;
			
			$facebook = new Facebook(array(
			  'appId'  => $appId,
			  'secret' => $secret,
			));
			
    		$user=new LoginForm;
	        $this->render('menuLogin', array(
	        	'model'=>$user,
	         	'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
			));
			
    	}else{
			$user=User::model()->findByPk(Yii::app()->user->id);
	        $this->render('menu', array(
	        	'user'=>$user,
	        	'countP'=>count($user->products),
	        	'countSC'=>count($user->shoppingCart)
			));
		}
    }
}