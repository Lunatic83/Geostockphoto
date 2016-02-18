<div class="container-central-form gsp-txt-color" style='margin-left: 200px; margin-right: 200px;'>

<?php if(!$post){?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'resetpwask-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,),
		'htmlOptions' => array('class'=>'well background_box', 'style'=>'text-align:center;'),
	)); ?>
		
	<h3>Did you not validate your email?</h3>
	<p>Request another activation email <br> write here your email address</p>
		<?php echo $form->textField($modelUser,'email',array('size'=>32,'maxlength'=>255,'placeholder'=>'Email','style'=>'text-align:center;')); ?>
		<?php echo $form->error($modelUser,'email', array('style'=>'color: red')); ?>
		
		<p><?php $this->widget('CCaptcha', array(
							    	'buttonLabel' => "Refresh captcha",'id'=>'idCaptcha'
							    	)); ?>
        	    <div class="captcha"><?php echo CHtml::activeTextField( $modelUser,'verifyCodeCaptcha', array('class'=>'captcha')); ?></div>
        	</p>    
    		<?php echo $form->error($modelUser,'verifyCodeCaptcha', array('style'=>'color: red')); ?>
		
		<div class="buttons">
			<?php echo CHtml::submitButton('Send email',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0')); ?>
		</div>
	
	<?php $this->endWidget(); ?>
<?php }else {?>
	<div class="well background_box">
	<?php if($validRequest && isset($modelUser->email)){?>
		<h3>Activation email has been sent</h3>
		<p>Please check your email <b><?php echo $modelUser->email;?></b> to validate your account</p>
	<?php }else {?>
		<h3>Is not possible to activate your account</h3>
		<p>Please send an email to <?php echo CHtml::mailto("info@geostockphoto.com"); ?> with your username</p>
	<?php }?>
	</div>
<?php }?>

</div>