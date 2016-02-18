<div class="container well margin-top-bottom background_box" style="background: white; text-align:center">
	<h3>Bring all your photos <br> from <span style="color: green">Panoramio</span> to <span class="darkblue">GeoStockPhoto</span></h3>
	You just need to give us your Panoramio ID and permission to take all your photos.<br>
	Our authomatic system will copy all your photos from the Panoramio website.<br>
	<i>You can show your photos, but you can also earn money!</i>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'panoramio-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=>array(
	        'style'=>'margin-top: 10px'
	    )
	));
	?>
		<div style="margin-bottom: 10px; text-align: center">
			<?php echo $form->textField($modelUser, 'idUserPanoramio', array('placeholder'=>"Panoramio ID User", 'maxlength'=>8, 'class'=>'span2', 'style'=>'text-align: center')); ?><br>
			Accept <?php echo CHtml::link('Terms and Conditions', Yii::app()->createUrl('/panoramio-terms'));
			echo $form->checkBox($modelUser, 'acceptTermsPanoramio', array('style'=>'margin:0 0 0 5px')); ?><br>
			<?php
				echo CHtml::ajaxSubmitButton(
					"Send Request",
					array('photo/panoramioRequested'),
					array('beforeSend' => "js:function(){document.getElementById('msg_error').style.display='none';
							document.getElementById('msg_success').style.display='none'}",
						'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
					),
					array('class'=>'btn btn-primary', 'style'=>'margin-top: 10px')
				);
			?>
		</div>
		<div id="msg_error" class="alert in alert-error" style="display:none"></div>
		<div id="msg_success" class="alert in alert-success" style="display:none">Your request has been saved.<br>Photo transfer will start in few minutes.</div>
		
	<?php $this->endWidget();?>
</div>