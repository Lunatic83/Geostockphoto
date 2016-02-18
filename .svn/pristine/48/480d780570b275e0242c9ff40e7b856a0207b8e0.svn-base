<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	//'enableAjaxValidation'=>true,
    //'enableClientValidation'=>true,
    //'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>

	<div class="buttons well-split" style="text-align:center; margin-top: 10px">
		<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm.png' alt='' /></a>
	</div>
	<br>
		<img src='<?php echo Yii::app()->baseUrl; ?>/images/login_bar.png' alt='' />
	<br>
	
	<h3>Create Account</h3>

<div style="margin-top:10px;">
	<?php echo $form->textField($modelUser, 'username', array('size'=>32, 'maxlength'=>32, 'placeholder'=>'Username', 'name'=>'index_username')); ?>
	<span class="help-inline " style="margin-bottom: 10px;"><?php echo $form->error($modelUser,'username',array('style'=>'color: red')); ?></span>		
	
	<?php echo CHtml::submitButton('Create', array('submit'=>CController::createUrl('user/create'), 'class'=>'btn btn-primary btn-large')); ?>
</div>	

	
<?php $this->endWidget(); ?>