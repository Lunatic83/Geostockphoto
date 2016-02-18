<div id="info_ftp_account" style="text-align:center; margin-top: 10px">
	<?php
	if(isset($ftpAccount)){
		$this->renderpartial('_viewFtpAccount',array(
			'username'=>$ftpAccount->username,		
			'password'=>$ftpAccount->password,	
		));
	}else{
		$fuction = 'ajaxFunctionGeneric(\''.Yii::app()->createUrl('photo/ftpRequest').'\', \'info_ftp_account\')';
		echo CHtml::link(
		  'Request FTP account!',
		  '#',
		  array('onclick' => $fuction, 'class'=>'btn btn-primary btn-small')
		);
	}
	?>
</div>