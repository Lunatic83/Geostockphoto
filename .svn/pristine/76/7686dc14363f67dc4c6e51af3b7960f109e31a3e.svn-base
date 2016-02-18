<div class="container-central-form gsp-txt-color background_box">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'resetpwdo-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		'htmlOptions' => array('class'=>'well span5', 'style'=>'text-align:center;'),
	)); ?>
	
		<h3>Reset your password</h3>
		<p>Now you can reset your password, please insert new password and repeat it</p>
	
		<?php echo $form->passwordField($modelUser,'clearpassword',array('size'=>32,'placeholder'=>'New password')); ?>
		<?php echo $form->error($modelUser,'clearpassword',array('style'=>'color: red')); ?>
	
		<?php echo $form->passwordField($modelUser,'clearpassword_repeat',array('size'=>32,'placeholder'=>'Repeat new password')); ?>
		<?php echo $form->error($modelUser,'clearpassword_repeat',array('style'=>'color: red')); ?>
	
		<div class="buttons">
			<?php echo CHtml::submitButton('Change password',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0')); ?>
		</div>
	
	<?php $this->endWidget(); ?>

</div><!-- form -->