<div id="log-reg">
    <ul class="menu">
        <li><a class="login" href="#">Login</a></li>
        <!--<li>|</li>
        <li><a href="#">Register</a></li>-->
    </ul>
</div>


<div id="login">
	<div>
    	<div class="left">
        	<img class="right" src="<?php echo Yii::app()->baseUrl?>/images/close.png" width="15" height="15" alt="close">
        	<p>Login</p>
        </div>
		<div class="right">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'action'=>Yii::app()->createUrl('site/login'),
				'clientOptions'=>array(
				//	'validateOnSubmit'=>true,
				),
				'htmlOptions' => array('onSubmit'=>'js:codifica_password()'),
			)); ?>
	        	<?php echo $form->textField($model,'username', array('OnChange'=>"js:askChallenge(this.value,'".Yii::app()->createAbsoluteUrl('')."')")); ?>
				<?php echo $form->passwordField($model,'password'); ?>
	            <?php echo $form->checkBox($model,'rememberMe', array('class'=>'rem-me')); ?><label>Remember me</label>
	            <?php echo CHtml::submitButton('Login', array('class'=>'button'));?>
	            
	            <?php echo $form->hiddenField($model,'challenge'); ?>
				<?php echo $form->hiddenField($model,'usernamereal'); ?>
				<?php echo $form->hiddenField($model,'hiddenpassword'); ?>
   			
			<?php $this->endWidget(); ?>
            <?php echo CHtml::link('Did you forget your password?', Yii::app()->createUrl('/user/resetpwask/'));?>
        
	        <a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm.png' alt='' /></a>
        
        </div>
   </div>
</div>