<script type="text/javascript">
function changeRows(cRows) {
	for(var i=2; i<=10; i++){
		if(i<=cRows){
			var file = document.getElementById('file'+i);
			file.style.display="block";
		}else{
			var file = document.getElementById('file'+i);
			file.style.display="none";
		}
	}
}
</SCRIPT>

<div style="margin-top: 10px">
	Upload
	<select style="width:60px" onchange="changeRows(this.value)">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3" selected>3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select>
	photos.
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		//'id'=>'login-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		'action'=>Yii::app()->createUrl('photo/upload'),
	)); ?>

	<?php //foreach($items as $i=>$item):
		for ($i=1;$i<=10;$i++){
	?>
		<div id="file<?php echo $i?>" <?php if($i>3)echo "style='display:none'"?>>
			<?php //echo $form->labelEx($items,'Photo #0'.($i).':'); ?>
			<?php echo $form->fileField($items,'image'.$i, array('size'=>10,'maxlength'=>10)); ?>
		</div>
	<?php } //endforeach; ?>
	<?php //echo CHtml::submitButton('Upload', array('submit'=>'upload', 'class'=>'button')); ?>

	<br>
	<div style="float:right; margin-right:20px">
   	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'type'=>'', 'size'=>'small', 'label'=>'Reset')); ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'size'=>'small', 'label'=>'Upload')); ?>
	    
	</div>
	

<?php $this->endWidget(); ?>