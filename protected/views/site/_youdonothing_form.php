<div style="margin-top: 10px">
	<hr>
	<h4 class="orange">Send us your request</h4>
	<?php if(!isset($modelYoudonothing->idUser)){?>
		Fill in the following form (flields with <span class="required">*</span> are required).<br>
		We will send you an email with our response in few hours.
	
		<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'youdonothing-form',
			'enableAjaxValidation'=>true,
			'htmlOptions'=>array(
		        'style'=>'margin-top: 20px'
		    )
		));
		?>
			<div style="margin-bottom: 10px">
				How many photos do you have in your portfolio? <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'nPhotos',array('maxlength'=>5, 'class'=>'span1', 'style'=>'margin-left: 10px')); ?><br>
				Link to your Portfolio #1: <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'link1',array('maxlength'=>128, 'class'=>'span4', 'style'=>'margin-left: 10px')); ?><br>
				Link to your Portfolio #2:
					<?php echo $form->textField($modelYoudonothing,'link2',array('maxlength'=>128, 'class'=>'span4', 'style'=>'margin-left: 10px')); ?><br>
				Do you want us to edit:&nbsp;&nbsp;&nbsp;
					Category <?php echo $form->checkBox($modelYoudonothing,'flagCategory',array('style'=>'margin-top:0px')); ?>&nbsp;&nbsp;&nbsp;
					Position <?php echo $form->checkBox($modelYoudonothing,'flagPosition',array('style'=>'margin-top:0px')); ?><br>
				Storage device <span class="required">*</span>
					<?php echo $form->textField($modelYoudonothing,'device',array('maxlength'=>15, 'class'=>'span3', 'style'=>'margin-left: 10px; margin-top: 10px')); ?><br>
				Do you want us to send your storage device back to you?
					<?php echo $form->checkBox($modelYoudonothing,'flagSendBackDevice',array('style'=>'margin-left: 10px; margin-top:0px')); ?><br>
				Upper bound cost (US dollars) you do not want to exceed
					<?php echo $form->textField($modelYoudonothing,'upperBound',array('maxlength'=>5, 'class'=>'span1', 'style'=>'margin-left: 10px; margin-top: 10px')); ?><br>
				Accept <?php echo CHtml::link('Terms and Conditions', Yii::app()->createUrl('/youdonothing-terms'));?>
					<?php echo $form->checkBox($modelYoudonothing,'acceptTerms',array('style'=>'margin-top:0px')); ?>
			</div>
			<?php
				echo CHtml::ajaxSubmitButton(
					"Send Request",
					array('site/sentYoudonothing'),
					array('beforeSend' => "js:function(){document.getElementById('msg_error').style.display='none';}",
						'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('site/youdonothing')."', 'msg_error', 'null')}"
					),
					array('class'=>'btn btn-primary btn-small')
				);
			?>
			<br><br>
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
			
		<?php $this->endWidget(); ?>
	<?php }elseif(!isset($modelYoudonothing->confCode)){?>
		You have already sent us your request.<br>
		<b style="color: red">We will send you an email with our response in few hours.</b>
	<?php }elseif($modelYoudonothing->confCode=='00000000'){?>
		We are sorry to inform you that your request has been rejected.
	<?php }else{?>
		Your request has been approved!<br>
		We have sent you an email with all the details of price and procedure.<br>
		When you sent us your photos, do not forget to also include a paper where you should write <br>your username and
		the following confirmation code <b><?php echo $modelYoudonothing->confCode?></b>.
	<?php }?>
</div>