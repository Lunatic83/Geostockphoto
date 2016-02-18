<div class="container-central-form gsp-txt-color" style='margin-left: 200px; margin-right: 200px;'>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'resetpwask-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,),
		'htmlOptions' => array('class'=>'well background_box', 'style'=>'text-align:center;'),
	)); ?>
		<h3>Reset your password</h3>
		<p>Before you can reset your password<br> write here your email address</p>
	
		<?php echo $form->textField($modelUser,'email',array('size'=>32,'maxlength'=>255,'placeholder'=>'Email','style'=>'text-align:center;')); ?>
		<?php echo $form->error($modelUser,'email', array('style'=>'color: red')); ?>
		
		<div class="buttons">
			<?php echo CHtml::submitButton('Send email',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0')); ?>
		</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->