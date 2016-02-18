<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-abuse-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('onSubmit'=>'js: return false;')
)); ?>

	<?php echo $form->textField($modelTicket, 'subject', array('style'=>'display:none')); ?>
	<?php echo $form->hiddenField($modelTicket,'idProduct'); ?>
	
	<div class="photo" style="float:left; margin: 20px">
		<?php
		// DISPLAY PHOTO
		$img = "<IMG id='img_photo' SRC='".$modelProductPp->getUrl(120)."' alt=''/>";
		if(isset($modelProductPp->product)){
			echo CHtml::link(
				  $img,
				  Yii::app()->createUrl('photo/view').'/'.$modelProductPp->idProduct.'/'.$modelProductPp->urlTitle
			);
		}
		else
			echo $img;
		?>
	</div>
	
	<div style="margin-left: 160px">
		<div style="float:left; text-align: left; margin-left: 10px">If you think there is something wrong with this photo, <br>please write your motivation below and submit the report.</div>
		<?php echo $form->textArea($modelTicket,'message',array('rows'=>7, 'maxlength'=>128, 'style'=>'resize:none; margin: 10px; width: 740px')); ?>
		
		<div class="btn-group" style="text-align: center; float: left; margin-left: 15px">
			<?php echo CHtml::ajaxSubmitButton('Submit Report',
				array('photo/reported'),
				array('beforeSend' => "js:function(){
						document.getElementById('msg_success').style.display='none';
						document.getElementById('msg_error').style.display='none';
					}",
					'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
				),
				array('class'=>'btn btn-primary btn-small')
			); ?>
			<?php echo CHtml::resetButton('Cancel', array('class'=>'btn btn-primary btn-small')); ?>
		</div>
		
		<div style="text-align: center; float: left; margin-left: 15px">
			<div id="msg_success" class="alert in alert-success" style="display:none">Report has been sent.</div>
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
		</div>
	</div>
	

<?php $this->endWidget(); ?>