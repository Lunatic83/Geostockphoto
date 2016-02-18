<div class="container well gsp-txt-color margin-top-bottom background_box" style="text-align: center">
	<h3>Convert Credits</h3>
	<p >You have earned <b id="creditsEarned"><?php echo $modelUser->creditsEarned==0? '0.00' : $modelUser->creditsEarned; ?></b> credits </p>

	<script type="text/javascript">
		function changeCreditViewed(xhr){
			if(xhr.responseText!=''){
				var myObject = eval('('+xhr.responseText+')');
				if(myObject.credits!=null){
					if(myObject.credits<=<?php echo $payoutThresholdValue ?>){
						$('#convertCredits-form').remove();
						
					}
					$('#msg_standard').remove();
					$('#creditsEarned').text(myObject.credits)
				}
			}
		}
	</script>


	<?php if($modelUser->creditsEarned>=$payoutThresholdValue){  ?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'convertCredits-form',
				'enableAjaxValidation'=>false,
				//'enableClientValidation'=>true,
				'focus'=>array($modelConvertCredits,'credits'),
				//'clientOptions'=>array('validateOnSubmit'=>true,),
				'htmlOptions'=>array('class'=>'form-inline','onSubmit'=>'js: return false;'),
			)); ?>		
			
				<?php echo $form->labelEx($modelConvertCredits,'credits'); ?>
				<?php echo $form->textField($modelConvertCredits,'credits',array('id' => 'credit-input', 'class'=>'offset1 span2', 'placeholder'=>'0.00', 'style'=>'text-align: right;')); ?>
			
				<?php 
			//		echo CHtml::submitButton('Request to convert',array('class'=>'btn btn-primary'));
					echo CHtml::ajaxSubmitButton('Request to convert',
						array('user/ajaxConvertCredits'),
						array('beforeSend' => "js:function(){
								document.getElementById('msg_success').style.display='none';
								document.getElementById('msg_error').style.display='none';
								document.getElementById('ajax-loader').style.display='block';
								document.getElementById('request-button').disabled =true;
								document.getElementById('credit-input').disabled =true;
							}",
							'complete'=>"js: function(xhr){
											changeCreditViewed(xhr); 
											submitted(xhr, 'null', 'msg_error', 'msg_success'); 
											document.getElementById('ajax-loader').style.display='none';
											document.getElementById('request-button').disabled =false;
											document.getElementById('credit-input').disabled =false;
										}"
							),
							array('class'=>'btn btn-primary', 'id'=>'request-button')
						); 
				?>
				<div id="ajax-loader"style='text-align: center; margin-top: 10px; margin-bottom: 10px; display: none'><img src="<?php echo  Yii::app()->baseUrl ?>/images/ajax-loader.gif" alt="waiting load" height="50" width="50"></div>
			<?php $this->endWidget();?>
			<p id="msg_success" class="alert in alert-success" style="display:none">Your request will be payed out to your <b><?php echo $modelUser->email; ?></b> paypal account, on the 15th of the next month.</p>
			<p id="msg_error" class="alert in alert-error" style="display:none"></p>
		<p id="msg_standard">Your request will be payed out to your <b><?php echo $modelUser->email; ?></b> paypal account, on the 15th of the next month.</p>			

	<?php }else { ?>
			<p id="msg_error" class="alert in alert-error" >Sorry the minimum amount of credits for your payout is <?php echo $payoutThresholdValue; ?>.</p>
	<?php } ?>
	
</div>
