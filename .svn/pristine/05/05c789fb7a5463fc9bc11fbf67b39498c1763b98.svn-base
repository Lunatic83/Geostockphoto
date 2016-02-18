<?php 
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
?>

<?php if(isset($firstIdTransactionPhoto)){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$firstIdProduct, 'zoom'=>true));?>
	<input type="hidden" id="idSelected" value="<?php echo $firstIdTransactionPhoto?>" />
<?php } ?>

<div class="margin-top-bottom container-fixed-margin gsp-txt-color">
<div class="container-fluid well background_box">
	Remember that you can download your photos within 2 weeks of your purchase.
	<?php if($firstIdTransactionPhoto!=null){
		$this->widget('zii.widgets.CListView', array(
			'htmlOptions'=>array('id'=>'view_inner'),
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view_purchased',
			'enablePagination'=>true,
			'ajaxUpdate'=>false,
			"template" => "{summary}{pager}{items}",
			'viewData'=>array('timeWindow'=>$timeWindow)
		));
	}else{?>
		<div style="float:clear; margin-left:20px; margin-top:50px">
			You do not have any photos here!
		</div>
	<?php }?>
</div></div>