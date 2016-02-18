<?php if($idProduct!=null){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$idProduct, 'zoom'=>true, 'class'=>'right-panel-map','btnDetails'=>true));
} ?>

<div id="countPhotos" class="tabs_count">
	<span id="cntPhotosMap" style="font-size: 15px"></span> <br> in this area
</div>

<div id="map_canvas" style="overflow: visible important!;">
</div><!-- map -->

<div id="photo-line" style="margin-bottom: -20px"> --> 
</div>

<div class="tabs" style="position: relative; top: -161px; height: 0px">
	<?php $url=Yii::app()->createUrl('photo/topten').'/idPhotoType/1/offset/0';?>
	<a onclick="<?php echo "ajaxFuncGenFade('".$url."/orderBy/best', 'photo-line', getZoomAndParams)"?>; orderByMoveMap='best'">
		<div class="left tab_active"><p>BEST</p></div>
	</a>
	<a onclick="<?php echo "ajaxFuncGenFade('".$url."/orderBy/last', 'photo-line', getZoomAndParams)"?>; orderByMoveMap='last'">
		<div class="right tab_no_active"><p>LAST</p></div>
	</a>
</div>