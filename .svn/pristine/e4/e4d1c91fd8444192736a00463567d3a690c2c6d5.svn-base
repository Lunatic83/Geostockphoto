<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'photo-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
)); ?>
	
	<!-- START SELECTED PHOTO -->
	
		<div style='display: none'>
			<?php echo $form->textField($selectedPhoto,'count',array('size'=>2,'maxlength'=>2)); ?>
		</div>
	
		<?php for($i=1; $i<=$selectedPhoto->count; $i++){ ?>
			<div style='display: none'>
				<?php echo $form->textField($selectedPhoto,'selection['.$i.']',array('size'=>2,'maxlength'=>2)); ?>
			</div>
		<?php } ?>
	
	<!-- END SELECTED PHOTO -->
	
	<!-- START PRODUCT INPUTS -->

	<div style="clear: both">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('style'=>'width: 250px; resize:none', 'maxlength'=>128, 'row'=>2)); ?>
	</div>

	<!-- END PRODUCT INPUTS -->

	<!-- START PHOTO INPUTS -->
	<?php
		echo $this->renderPartial('_editPhoto',
			array(
				'form'=>$form,
				'modelProduct'=>$model,
				'categories'=>$categories,
				//'photoType'=>$photoType,
				//'categoriesBN'=>$categoriesBN
			)
		);
	?>
	<!-- END PHOTO INPUTS -->
	
	<div style="text-align:center; margin-right:30px">
		<?php echo "Accept ".CHtml::link('Terms and Conditions<br>for the Submit', Yii::app()->createUrl('/submit-terms'));?>
		<?php echo $form->checkBox($model,'termsAccepted',array('style'=>'margin-top:0px')); ?>
	</div>
	
	<div class="btn-group" style="margin-top:10px; text-align:center; margin-right:30px">
		<?php 
			echo CHtml::ajaxSubmitButton(
				"Save",
				array('photo/ajaxSave'),
				array(
					'beforeSend' => "js:function(){
						document.getElementById('msg_success').style.display='none';
						document.getElementById('msg_error').style.display='none';
						document.getElementById('msg_submit_success').style.display='none';
					}",
					'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
				),
				array('class'=>'btn btn-small btn-primary' )
			);
			if($idUserSlave!='')
				$url=CController::createUrl('photo/submit', array('display'=>'submitSuccess', 'id'=>$idUserSlave));
			else 
				$url=CController::createUrl('photo/submit', array('display'=>'submitSuccess'));
			echo CHtml::ajaxSubmitButton(
				"Submit",
				array('photo/submitted'),
				array(
					'beforeSend' => "js:function(){
						document.getElementById('msg_success').style.display='none';
						document.getElementById('msg_error').style.display='none';
						document.getElementById('msg_submit_success').style.display='none';
					}",
					'complete'=>"js: function(xhr){submitted(xhr, '".$url."', 'msg_error', 'null')}"
				),
				array('class'=>'btn btn-small btn-primary' )
			);
			echo CHtml::submitButton(
				  'Edit',
				  array('submit'=>CController::createUrl('photo/edit'), 'class'=>' button btn btn-small btn-primary')
			);
			echo CHtml::button(
				"Delete",
				array('class'=>'btn btn-small', 'onclick'=>'js: tstEditconfirm("delete");' )
			);
			/*$url=CController::createUrl('photo/submit');
			echo CHtml::ajaxSubmitButton(
				"Delete",
				array('photo/deleteMultiplePhoto'),
				array(
					//'async'=>'false',
					'beforeSend' => "js:function(){
						document.getElementById('msg_success').style.display='none';
						document.getElementById('msg_error').style.display='none';
						document.getElementById('msg_submit_success').style.display='none';
					}",
					'complete'=>"js: function(xhr){submitted(xhr, '".$url."', 'msg_error', 'null')}"
				),
				array('class'=>'btn btn-small btn-primary', 'confirm'=>"Do you want to delete the selected photo(s)?")
			);*/
		?>
		<!-- <input class="btn btn-small btn-primary" type="submit" name="yt3" value="Delete" id="yt3"> -->
	</div>
		
<?php $this->endWidget(); ?>


<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form-remove',
	'enableClientValidation' => false,
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('photo/deleteMultiplePhoto'),
	'htmlOptions'=>array(
        'onSubmit'=>'js: return false;'
    )
	
));
?>
	
	<div style='display: none'>
		<?php echo $form->textField($selectedPhoto,'count',array('size'=>2,'maxlength'=>2)); ?>
	</div>
	<?php for($i=1; $i<=$selectedPhoto->count; $i++){ ?>
		<div style='display: none'>
			<?php echo $form->textField($selectedPhoto,'selection_del['.$i.']',array('size'=>2,'maxlength'=>2)); ?>
		</div>
	<?php } ?>


<?php $this->endWidget(); ?>

<script type="text/javascript">
/*jQuery(function($) {
	jQuery('body').undelegate('#yt3','click').delegate('#yt3','click',function(){if(tstEditconfirm('delete')) {jQuery.ajax({'beforeSend':function(){
		document.getElementById('msg_success').style.display='none';
		document.getElementById('msg_error').style.display='none';
		document.getElementById('msg_submit_success').style.display='none';
	},'complete': function(xhr){submitted(xhr, '/workspace/geostockphoto/photo/submit', 'msg_error', 'null')},
		'type':'POST','url':'/workspace/geostockphoto/photo/deleteMultiplePhoto','cache':false,'data':jQuery(this).parents("form").serialize()});return false;} else return false;});
});*/
</script>