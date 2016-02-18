<?php 
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/shoppingOpt_sel.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
?>

<div class="container well margin-top-bottom background_box">
	<div class="alert in alert-block alert-info">
		<?php
		if($selectedPhoto->count>0){
			for($i=1; $i<=$selectedPhoto_all->count; $i++){
				if(isset($selectedPhoto_all->selection[$i])){
			?> 
				<IMG class="photo" SRC="<?php echo $selectedPhoto_all->fileName[$i]?>"  style="margin-bottom:5px"/>
			<?php }}
		}else {
			?>
				<div class="row">
				<p style="margin-left: 30px;">You do not have any photos waiting for submit!</p>
				</div>
			<?php 
		}?>
	</div>
	
	<?php
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'photo-form-remove',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
	        'onSubmit'=>'js: return false;'
	    )
		
	));
	?>		
			<div class="row" style='display:none'>
				<?php echo $form->textField($selectedPhoto_all,'count',array('size'=>2,'maxlength'=>2)); ?>
			</div>
			
			<?php for($i=1; $i<=$selectedPhoto->count; $i++){?>
				<div class="row" style='display:none'>
					<?php echo $form->textField($selectedPhoto_all,'selection['.$i.']',array('size'=>2,'maxlength'=>2, 'id'=>'SelectedPhoto_image'.$i)); ?>
					<?php echo $form->error($selectedPhoto_all,'selection['.$i.']'); ?>
				</div>
			<?php } ?>
			
			
			<div style="text-align:center; margin-bottom:10px">
				<?php echo "Accept ".CHtml::link('Terms and Conditions for the Submit', Yii::app()->createUrl('/submit-terms'));?>
				<?php echo $form->checkBox($modelProductPp,'termsAccepted',array('style'=>'margin-top:0px', 'id'=>'termsAccepted',  'onclick'=>"duplicate()")); ?>
			</div>
			
			<div class="btn-group" style="text-align:center">		
				<?php 

						echo CHtml::ajaxSubmitButton(
							"Submit",
							array('photo/ajaxSave/pendingSubmit/1'),
							array('beforeSend' => "js:function(){
									document.getElementById('msg_error_top').style.display='none';
								}",
								'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('photo/pendingsubmit')."', 'msg_error_top', 'null')}"
							),
							array('class'=>'btn btn-small btn-primary')
						);
				
				?>
			</div>
			<br>
			<div id="msg_error_top" class="alert in alert-error" style="display:none"></div>
				
		
			
	<?php $this->endWidget(); ?>	
	
</div>