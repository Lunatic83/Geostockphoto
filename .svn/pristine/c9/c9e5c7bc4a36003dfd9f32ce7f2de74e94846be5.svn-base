<div class="container-central-form gsp-txt-color">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		//'validateOnSubmit'=>true,
	),
	//TODO non bisogna rimettere il validate on submit altrimenti richiama 2 volte la codifica_password e non funziona.
	'htmlOptions' => array('class'=>'well span5 background_box', 'style'=>'text-align:center;','onSubmit'=>"js:codifica_password($('#LoginForm_username').val(),'".Yii::app()->createAbsoluteUrl('')."')"),
)); ?>
	
	<div class="buttons well-split">
			<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm.png' alt='' /></a>
	</div>
	<br><br>
		<img src='<?php echo Yii::app()->baseUrl; ?>/images/login_bar.png' alt='' />
	<br><br>
	
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('style'=>'text-align:center;','OnChange'=>"js:askChallenge(this.value,'".Yii::app()->createAbsoluteUrl('')."')")); ?>
		<?php echo $form->error($model,'username',array('style'=>'color: red')); ?>
	
	
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('style'=>'text-align:center;')); ?>
		<?php echo $form->error($model,'password',array('style'=>'color: red')); ?>
	
	
	<div class="rememberMe" style="text-align:left; margin-left: 105px;">
		<?php echo $form->checkBox($model,'rememberMe', array('style'=>'float:left; margin-right: 5px;')); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
	</div>

	<?php echo CHtml::link('Register', Yii::app()->createUrl('/user/create/'));?> |
	<?php echo CHtml::link('Forgot your password?', Yii::app()->createUrl('/user/resetpwask/'));?>
	
	<?php echo $form->hiddenField($model,'challenge'); ?>
	<?php echo $form->hiddenField($model,'usernamereal'); ?>
	<?php echo $form->hiddenField($model,'hiddenpassword'); ?>
	
	
	<div class="buttons">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0')); ?>
	</div>
	


<?php $this->endWidget(); ?>

</div><!-- form -->

       
