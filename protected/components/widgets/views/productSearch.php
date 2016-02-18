<div id="advanced-search-popover" class='form-horizontal'>
	<div class='control-group' style='margin-bottom:10px; margin-left:20px;'>
		<input type='text' id='username' class='control-label span2' style='text-align:center;' placeholder='Photographer' value='<?php echo $user?>'>
		<div class='controls'>
			<table class='star_rid'>
				<tr>
					<td style='cursor: pointer;' onMouseOver='changeImgIndex(1)' onMouseOut='changeImg_mouseOutIndex()' onClick='doneIndex(1)'><img width=25px height=25px src='<?php echo Yii::app()->baseUrl?>/images/star_yellow.png' name='stella1'></td>
					<td style='cursor: pointer;' onMouseOver='changeImgIndex(2)' onMouseOut='changeImg_mouseOutIndex()' onClick='doneIndex(2)'><img width=25px height=25px src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name='stella2'></td>
					<td style='cursor: pointer;' onMouseOver='changeImgIndex(3)' onMouseOut='changeImg_mouseOutIndex()' onClick='doneIndex(3)'><img width=25px height=25px src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name='stella3'></td>
					<td style='cursor: pointer;' onMouseOver='changeImgIndex(4)' onMouseOut='changeImg_mouseOutIndex()' onClick='doneIndex(4)'><img width=25px height=25px src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name='stella4'></td>
					<td style='cursor: pointer;' onMouseOver='changeImgIndex(5)' onMouseOut='changeImg_mouseOutIndex()' onClick='doneIndex(5)'><img width=25px height=25px src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name='stella5'></td>
				</tr>
			</table>
			<?php echo CHtml::textField('rate', '1',
				array('id'=>'rate',
				       'maxlength'=>1,
					   	'size'=>1,
						'style'=>'display:none'
				)
			);
			?>
		</div>
	</div>
	<div class='control-group' style='margin-bottom:10px'>
		<?php echo CHtml::dropDownList('idCategory1','idCategory1',
			CHtml::listData($categories,'idCategory','name'),
			array('empty'=>'All categories','class'=>'span2')
		);
		echo CHtml::dropDownList('idSize','idSize',
			CHtml::listData($size,'idSize','code'),
			array('class'=>'span1', 'style'=>'margin-left: 10px; margin-right: 10px; width: 90px')
		);
		echo CHtml::dropDownList('idLicense','idLicense',
			CHtml::listData($license,'idLicense','name'),
			array('empty'=>'All licenses','style'=>'width: 110px')
		);?>
	</div>
	<div class='control-group' style='margin-bottom:10px; margin-left: 115px;'>	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Search',
		    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		    'size'=>'small', // null, 'large', 'small' or 'mini'
			'htmlOptions'=>array('onclick' => "ajaxFunctionUpdate($idPhotoType)"),
		));?>
		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Reset',
		    //'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		    'size'=>'small', // null, 'large', 'small' or 'mini'
			'htmlOptions'=>array('onclick' => "resetMapIndex($idPhotoType)"),
		)); ?>
	</div>
</div>


