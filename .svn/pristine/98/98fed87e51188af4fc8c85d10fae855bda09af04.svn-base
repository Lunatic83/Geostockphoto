<script type="text/javascript">
	function showModifyEmailBlock(){
		if(document.getElementById('modify_email_block').style.display=='none'){
			tstModifyEmailConfirm('modify-mail');
			$('#User_email_repeat').val('');	
		}else{
			document.getElementById('modify_email_block').style.display='none';
			document.getElementById('User_email').disabled=true;
			$('#User_email_repeat').val('');
		}
		return false;
	}
	
	function showResetPasswordBlock(){
		if(document.getElementById('reset_password_block').style.display=='none'){
			tstResetPasswordConfirm('reset-password');
			$('#User_oldclearpassword').val('');
			$('#User_clearpassword').val('');
			$('#User_clearpassword_repeat').val('');
		}else{
			document.getElementById('reset_password_block').style.display='none';
			$('#User_oldclearpassword').val('');
			$('#User_clearpassword').val('');
			$('#User_clearpassword_repeat').val('');
		}			
		return false;
	}

	function verifyPhotoSelected(){		
		if(document.getElementById("User_imageProfile").value==""){
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="container well margin-top-bottom background_box">
	<?php if($modelUser->photoProfile==0 || $modelUser->lat==null){?>
		<div style="margin: 0 10px 0 10px" class="alert in alert-error">
			<span style="font-weight: bold">Don't miss this: </span>insert a photo and your position, customers will find you
			on our <a href="<?php echo Yii::app()->createUrl('user/map')?>">map with all our photographers</a>.<br>
			<span style="font-size: 90%">(You also need to have at least one photo on your portfolio. Soon customers will be able to request photos on-demand.)</span>
		</div>
	<?php }?>
	<div style="margin: 10px; float: right">
		<input type="text" id="address_edit" name="address_edit" style="width:440px; color:grey" onKeyPress="return submitenter(event, codeAddress, this.value)" placeholder="Search location...">
		<?php  echo CHtml::button('Reset Position', array('class'=>'btn btn-small','style'=>'margin-bottom: 9px; height:30px;', 'onclick'=>'removeMapPosition();')); ?>
		<div id="map_canvas_small" style="width:560px; height:300px; border:2px solid grey;"></div>
	</div>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
 		'enableClientValidation' => false,
		'enableAjaxValidation'=>false,
		'action'=>Yii::app()->createUrl('user/savePhotoProfile'),
        'htmlOptions' => array(
        	'enctype' => 'multipart/form-data',
        	'onSubmit'=>'js: return verifyPhotoSelected();'
		),		
	)); ?>
		<div class="well" style="background: white; width: 300px; min-height: 300px; text-align: center; margin: 10px;">
			<div class="">
				<?php echo "<img src='".$modelUser->getPhotoUrl()."' alt='".$modelUser->username."'/>";?>
			</div>
			<?php echo $form->fileField($modelUser,'imageProfile', array('size'=>20,'maxlength'=>10, 'style'=>'margin-top: 10px; margin-bottom: 10px;')); ?>
			<?php 
				if($modelUser->photoProfile==1){
					echo CHtml::submitButton('Change photo', array('class'=>'btn btn-small btn-primary', 'style'=>'margin-right: 5px')); 
					echo CHtml::Button('Delete photo', array('class'=>'btn btn-small btn','onClick'=>'tstDeletePhotoProfile(this);')); 
			 	}else{
					echo CHtml::submitButton('Upload photo', array('class'=>'btn btn-small btn')); 
			 	}
			?>
		</div>
	<?php $this->endWidget(); ?>
	

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'delete-photo-form',
 		'enableClientValidation' => false,
		'enableAjaxValidation'=>false,
		'action'=>Yii::app()->createUrl('user/deletePhotoProfile'),
        'htmlOptions' => array(
        	'enctype' => 'multipart/form-data',
        	//'onSubmit'=>'js: return tstDeletePhotoProfile(this);'
		),		
	)); ?>
			
	<?php $this->endWidget(); ?>

	


	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
	    /*'enableAjaxValidation'=>true,
 		'enableClientValidation' => false,
	    'clientOptions'=> array('validateOnSubmit'=>true,
        	'afterValidate'=>'js:function(){return false}'
        ),*/
		'enableAjaxValidation'=>false,
        'htmlOptions' => array(
        	//'enctype' => 'multipart/form-data',
        	'onSubmit'=>'js: return false;'
		),		
	)); ?>
		<div style='margin: 10px; height: 210px'>			
			<div style='float: left'>
				<div>
					<?php echo $form->labelEx($modelUser,'name',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelUser,'name',array('size'=>32,'maxlength'=>32, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php echo $form->labelEx($modelUser,'surname',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelUser,'surname',array('size'=>32,'maxlength'=>32, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php echo $form->labelEx($modelUser,'town',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelUser,'town',array('size'=>32,'maxlength'=>30, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php echo $form->labelEx($modelUser,'country',array('class'=>'label-form-row')); ?>
					<?php echo $form->textField($modelUser,'country',array('size'=>32,'maxlength'=>30, 'style'=>'width: 150px')); ?>
				</div>
				<div>
					<?php 
					echo $form->labelEx($modelUser,'birthdate',array('class'=>'label-form-row'));
					if(isset($modelUser->birthdate) && $modelUser->birthdate!='')
						$modelUser->birthdate=Yii::app()->dateFormatter->format('dd/MM/yyyy', $modelUser->birthdate);
					echo $form->textField($modelUser,'birthdate',array('size'=>32,'maxlength'=>30, 'style'=>'width: 150px', 'placeholder'=>"dd/mm/yyyy"));
					/*Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
					    $this->widget('CJuiDateTimePicker',array(
					        'model'=>$modelUser, //Model object
					        'attribute'=>'birthdate', //attribute name
					        'mode'=>'date', //use "time","date" or "datetime" (default)
					        'options'=>array(//'separator'=>' @ ',
						        'dateFormat'=>'dd/mm/yy',
					    		//'timeFormat'=>'hh:mm:ss',
					    		'addSliderAccess'=>true,
					    		'showAnim' =>'slide',
					    		'controlType'=>'slider'
					    	), // jquery plugin options
						    'language' => 'en_us',
					    	'htmlOptions'=>array('style'=>'width:150px'),
						)
					);*/?>
				</div>
			</div>
			
			<div style='float: left; margin-left: 70px'>
				<div>
			 		<?php echo $form->textField($modelUser,'email',array('size'=>32,'maxlength'=>255,'class'=>'email','disabled'=>'disabled')); ?>
		 			<?php echo CHtml::link('Modify your Email', '', array('style'=>'cursor: pointer; margin-left: 10px', 'onClick'=>'showModifyEmailBlock()'));?>
					<div id="modify_email_block" style="display: none">
						<?php echo $form->labelEx($modelUser,'email_repeat',array('style'=>'width: 120px; float: left; margin-top: 3px')); ?>
						<?php echo $form->textField($modelUser,'email_repeat',array('size'=>32,'maxlength'=>255,'class'=>'email', 'style'=>'width: 200px')); ?>
					</div>
				</div>
		 		<div>
					<?php echo CHtml::link('Reset your Password', '', array('style'=>'cursor: pointer', 'onClick'=>'showResetPasswordBlock()'));?>
					<div id="reset_password_block" style="display: none">
		 				<div>
							<?php echo $form->label($modelUser,'Old Password',array('class'=>'label-form-row', 'style'=>'width: 150px')); ?>
							<?php echo $form->passwordField($modelUser,'oldclearpassword',array('size'=>32, 'style'=>'width: 150px')); ?>
						</div>
		 				<div>
							<?php echo $form->label($modelUser,'New Password',array('class'=>'label-form-row', 'style'=>'width: 150px')); ?>
							<?php echo $form->passwordField($modelUser,'clearpassword',array('size'=>32, 'style'=>'width: 150px')); ?>
						</div>
		 				<div>
							<?php echo $form->label($modelUser,'clearpassword_repeat',array('class'=>'label-form-row', 'style'=>'width: 150px')); ?>
							<?php echo $form->passwordField($modelUser,'clearpassword_repeat',array('size'=>32, 'style'=>'width: 150px')); ?>
						</div>
					</div>
				</div>
			</div>
			
			<?php echo $form->hiddenField($modelUser,'lat'); ?>
			<?php echo $form->hiddenField($modelUser,'lng'); ?>
			
		</div>
		
		<?php if($modelUser->nPhotos>=$personalInfoThreshold){?>
			<div class="well">
				Biography
				<div style="margin: 10px 10px 0 0">
					<?php echo $form->textArea($modelUser->photographer,'CVSummary',array('rows'=>10, 'maxlength'=>1800, 'style'=>'resize:none; width: 100%')); ?>
				</div>
			</div>
		<?php }?>

		<?php if($modelUser->nPhotos>=$personalContactsThreshold){?>

			<div class="alert alert-block">
			Personal Contacts
					<?php $this->widget('application.components.widgets.ModifyPersonalContacts',
						array('form'=>$form,
				            'personalContactsManager'=>$personalContactsManager,
							'modelUser'=>$modelUser,
						)
					);?>
			</div>
		<?php }?>

	 	<div style="clear: both;"></div>
		<div>
			<div class="btn-group" style='text-align: center; margin-bottom: 10px'>
				<?php echo CHtml::ajaxSubmitButton(
					"Save",
					array('user/ajaxSaveModify'),
					array('beforeSend' => "js:function(){
							document.getElementById('msg_success').style.display='none';
							document.getElementById('msg_error').style.display='none';
						}",
						'complete'=>"js: function(xhr){
							submitted(xhr, 'null', 'msg_error', 'msg_success');
				 			if(document.getElementById('reset_password_block').style.display!='none'){
				 				if(document.getElementById('msg_error').style.display=='none'){
									showResetPasswordBlock()
				 				}
							}
				 			if(document.getElementById('modify_email_block').style.display!='none'){
				 				if(document.getElementById('msg_error').style.display=='none'){
									showModifyEmailBlock();
								}
							}
						}"
					),
					array('class'=>'btn btn-big btn-primary','style'=>'height: 30px; margin-bottom:1px;')
				);?>	
	 			<a class="btn btn-big" style="margin-left:-5px;" href="<?php echo Yii::app()->createAbsoluteUrl('user/view', array('username'=>$modelUser->username))?>">View</a>
			</div>
	 		
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
			<div id="msg_success" class="alert in alert-success" style="display:none">Form has been saved.</div>
		</div>
	<?php //$this->endWidget(); ?>
	
	
	<?php
	/*$form2=$this->beginWidget('CActiveForm', array(
		'id'=>'photo-form-remove',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
	        'onSubmit'=>'js: return false;'
	    )
		
	));*/
	?>
		<div class="alert in alert-block alert-info">
			<?php $this->widget('application.components.widgets.ModifyShoppingOptions',
				array('form'=>$form,
					'modelProductPp'=>$modelProductPp,
					'shoppingOptMan'=>$shoppingOptMan,
		            'shoppingOptManRm'=>$shoppingOptManRm,
					'modelShoppingType'=>$modelUser,
					'fieldShoppingType'=>'preferredLicenseType',
					'save'=>false
				)
			);?>
		</div>
	<?php $this->endWidget(); ?>
			
</div>