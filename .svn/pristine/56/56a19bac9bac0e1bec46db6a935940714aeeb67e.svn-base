<?php
 
class ModifyPersonalContacts extends CWidget
{
	var $modelUser;
	var $form;
	
	var $personalContactsManager;
	
    public function run(){
		$contacts= ConfUserContactType::model()->findAll();

    	$this->render('modifyPersonalContacts',
    		array('form'=>$this->form,
    			'personalContactsManager'=>$this->personalContactsManager,
    			'modelUser'=>$this->modelUser,
				'contacts'=>$contacts,
    		)
    	);
    }
}