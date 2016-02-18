<div style='display:none'>
	<?php 
	//echo $form->labelEx($modelProduct->photoPrePost,'idPhotoType');
	/*echo $form->dropDownList($modelProduct->photoPrePost,'idPhotoType',
		CHtml::listData($photoType,'idPhotoType','name'),
		array('empty'=>'--please select--', 'onchange'=>"changeCategories(1)", 'style'=>'width:80%')
	);*/?>
</div>

<div id="categories" <?php if($modelProduct->photoPrePost->idPhotoType!=1) echo "style='display:none'" ?> >
	<?php echo $form->labelEx($modelProduct->photoPrePost,'idCategory1'); ?>
	<?php echo $form->dropDownList($modelProduct->photoPrePost,'idCategory1',
		CHtml::listData($categories,'idCategory','name'),
		array('class'=>'span3', 'empty'=>'--please select--',)
	); ?>
</div>
<div id="categoriesBN" <?php if($modelProduct->photoPrePost->idPhotoType!=2) echo "style='display:none'" ?> >
	<?php //echo $form->labelEx($modelProduct->photoPrePost,'idCategory1BN'); ?>
	<?php /*echo $form->dropDownList($modelProduct->photoPrePost,'idCategory1BN',
			CHtml::listData($categoriesBN,'idCategory','name'),
			array('empty'=>'--please select--', 'style'=>'width:80%',)
			);*/ ?>
	
	<?php /*echo $form->labelEx($modelProduct->photoPrePost,'shootingDate');*/
		/*if(isset($modelProduct->photoPrePost->shootingDate) && $modelProduct->photoPrePost->shootingDate!='')
			$modelProduct->photoPrePost->shootingDate=
				Yii::app()->dateFormatter->format('dd/MM/yyyy HH:mm:ss', $modelProduct->photoPrePost->shootingDate);
		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	        'model'=>$modelProduct->photoPrePost, //Model object
	        'attribute'=>'shootingDate', //attribute name
	        'mode'=>'datetime', //use "time","date" or "datetime" (default)
	        'options'=>array(//'separator'=>' @ ',
		        'dateFormat'=>'dd/mm/y',
	    		'addSliderAccess'=>true,
	    		'showAnim' =>'slide'
	    	), // jquery plugin options
		    'language' => 'en_us',
	    	'htmlOptions'=>array(
		        'style'=>'width:174px; margin-left:15px'
		    ),
		        //'minDate' => 0
			)
		);*/
	//echo $form->textField($modelProduct->photoPrePost,'shootingDate'); ?>
</div>

<div style='display:none'>
	<?php echo $form->textField($modelProduct->photoPrePost,'lat',array('size'=>15,'maxlength'=>10));
	echo $form->textField($modelProduct->photoPrePost,'lng',array('size'=>15,'maxlength'=>10)); ?>
</div>