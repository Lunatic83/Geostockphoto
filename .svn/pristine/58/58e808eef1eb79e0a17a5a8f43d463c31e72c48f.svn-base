<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $idSession="";
	
	private $_isMobile;

	const RE_MOBILE='/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220)/i';
	
	public function getIsMobile(){
	    if ($this->_isMobile===null)
	        $this->_isMobile=isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']) || (isset($_SERVER['HTTP_USER_AGENT']) && preg_match(self::RE_MOBILE, $_SERVER['HTTP_USER_AGENT']));
	    return $this->_isMobile;
	}

	protected function beforeAction($action){
		Yii::app()->language=Yii::app()->request->getPreferredLanguage();
		
		//Creo la nuova sessione per l'operazione richiesta
		
		//if($this->route!='site/error'){
				
		$modelSession = new Session();		
		$modelSession->route= $this->route;
		$modelSession->idUser = (isset(Yii::app()->user->id) ? Yii::app()->user->id : null);
	
		if(Yii::app()->request->isAjaxRequest)
			$modelSession->isAjaxRequest = 1;//Yii::app()->request->isAjaxRequest;
		else
			$modelSession->isAjaxRequest = 0;
			
			
		if(!$modelSession->save())
			throw new CHttpException(400,'Is not possible create a new session');

		Yii::app()->session['idSession'] = $modelSession->idSession;
	 	
		//}
		
		$this->gspLog("info","START ACTION - ".$this->route);
		return true;
	}
	
	protected function afterAction($action){
		if($this->route!="user/remove")			
			$this->gspLog("info","END ACTION - ".$this->route);
	}
		
	protected function gspLog($level,$message){
		if(YII_DEBUG && (($level=="info") || $level=="trace")){
			$modelLog = new Log();
		
			$modelLog->idSession=Yii::app()->session['idSession'];
			$modelLog->level=$level;
			$modelLog->message=$message;	
			
			if(!$modelLog->save())
					throw new CHttpException('400','Is not possible to trace the operation');
		}else if(($level=="warning")||($level=="error")){
			$modelLog = new Log();
		
			$modelLog->idSession=Yii::app()->session['idSession'];
			$modelLog->level=$level;
			$modelLog->message=$message;	
			
			if(!$modelLog->save())
				throw new CHttpException('400','Is not possible to log the operation');
		}
	}
	
	protected function sendMail($text){
		$message = new YiiMailMessage;
		$message->setBody($text, 'text/html');
		$message->addTo('report-error@geostockphoto.com');
		$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
		$message->setSubject('Report Error');
		Yii::app()->mail->send($message);
	}
	
	protected function afterRender($view, &$output) {
	  parent::afterRender($view,$output);
	  //Yii::app()->facebook->addJsCallback($js); // use this if you are registering any $js code you want to run asyc
	  Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
	  Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
	  return true;
	}
}