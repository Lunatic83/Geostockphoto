<?php 
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
?>

<script type="text/javascript">
	function changeSelect(value){
		location.href=yii.urls.status+"/state/"+value;
	}
</script>

<?php if(isset($firstIdProduct)){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$firstIdProduct, 'zoom'=>true));?>
	<input type="hidden" id="idSelected" value="<?php echo $firstIdProduct?>" />
<?php } ?>

<div class="margin-top-bottom container-fixed-margin gsp-txt-color">
<div class="container-fluid well background_box">
	<?php if($idProductStatus!=null){?>
		<div style="float:left; margin-left:20px; margin-top:5px">
			<select onchange="changeSelect(this.value)" style="width: 150px">
				<option value="waiting_review" <?php if($idProductStatus==2) echo "selected"?>>Waiting Review</option>
				<option value="approved" <?php if($idProductStatus==3) echo "selected"?>>Approved</option>
				<option value="rejected" <?php if($idProductStatus==4) echo "selected"?>>Rejected</option>
				<option value="deleted" <?php if($idProductStatus==6) echo "selected"?>>Deleted</option>
			</select>
		</div>
	<?php }
	if($firstIdProduct!=null){
		$this->widget('zii.widgets.CListView', array(
			'htmlOptions'=>array('id'=>'view_inner'),
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'enablePagination'=>true,
			'ajaxUpdate'=>false,
			"template" => "{summary}{pager}{items}",
		));
	}else{?>
		<div style="float:clear; margin-left:20px; margin-top:50px">
			You do not have any photos here!
		</div>
	<?php }?>
</div></div>