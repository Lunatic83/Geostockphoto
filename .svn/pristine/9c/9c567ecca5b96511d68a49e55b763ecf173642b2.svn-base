<script type="text/javascript">
	$(document).ready(function(){
	    var myDate = new Date();
		var prettyDate = myDate.getDate()+ '/' + (myDate.getMonth()+1) + '/' +
		        myDate.getFullYear();
		$("#fromData").val(prettyDate);
		$("#toData").val(prettyDate);
		
		
	});
</script>


<?php if($modelProductPp!=null){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$modelProductPp->idProduct,
			'zoom'=>true,
			'vote'=>true
		)
	);
}?>


<div class="margin-top-bottom">
	<div class="well background_box" style="width:710px; margin-left:auto; margin-right:auto">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'statistic-form',
			//'enableAjaxValidation'=>true,
		    'enableClientValidation'=>true,
		    'clientOptions'=>array('validateOnSubmit'=>true,),
			'htmlOptions'=>array('class'=>'form-inline'),
		));
			
			echo $form->label($statisticsForm,'From',array());
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				//'name'=>'fromData',
				'model'=>$statisticsForm,
				'attribute'=>'fromData',
				// additional javascript options for the date picker plugin
				'options'=>array(
				    'showAnim'=>'fold',
				    'autoSize'=>true,
				    //'defaultDate'=> 0,
				    'dateFormat'=> 'dd/mm/yy',
				),
				'htmlOptions'=>array(
				    'style'=>'width: 72px; margin: 0 20px 0 5px'
				),
			));
		
			echo $form->label($statisticsForm,'To',array());
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				//'name'=>'toData',
				'model'=>$statisticsForm,
				'attribute'=>'toData',
				// additional javascript options for the date picker plugin
				'options'=>array(
				    'showAnim'=>'fold',
				    'autoSize'=>true,
				    'defaultDate'=> 0,
				    'dateFormat'=> 'dd/mm/yy',
				),
				'htmlOptions'=>array(
				    'style'=>'width: 72px; margin: 0 20px 0 5px'
				    ),
			));
			
			//echo $form->labelEx($statisticsForm,'Group by',array());
			//$groupBy=1; echo CHtml::dropDownList('groupBy', $groupBy,  array('1' => 'day', '2' => 'week','3' => 'month','4' => 'quarter','5' => 'year',),array('class'=>'input-small'));
		
			echo $form->label($statisticsForm,'Select ',array());
			//$selectedInfo=1;
			//echo CHtml::dropDownList('selectInfo', $selectedInfo, array('1' => 'Income', '2' => 'Expenditure', '3' => 'Credits'),
				//array('class'=>'input-small', 'style'=>'margin: 0 20px 0 5px'));
			echo $form->dropDownList($statisticsForm, 'selectInfo',
				array('1' => 'Sold', '2' => 'Bought', '3' => 'Credits'),
				array('style'=>'margin: 0 20px 0 5px; width: 100px')
			);
				
			$actionUrl = CController::createUrl('user/statistics');
			echo CHtml::submitButton(
				'Search',
				//$actionUrl,
				//array('update'=>"#statistics-content"),
				array('submit'=>$actionUrl,
					'class'=>'btn btn-big btn-primary',
					  'style'=>'margin-left: 40px')
			);				
		$this->endWidget(); ?>
			
		<div id="statistics-content">
			<?php $this->renderPartial('statisticsResult',array(
				'dataTransactionPhoto'=>$dataTransactionPhoto,
				'statisticsForm'=>$statisticsForm,
			));?>
		</div>
		
		<div style="margin-top: 20px; text-align: right">
			<a href="<?php echo CController::createUrl('user/convertcredits')?>">Convert your credits</a>
		</div>
	</div>
</div>
