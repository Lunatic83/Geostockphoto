<?php if($idPhotoRequest!=null){
	$this->widget('application.components.widgets.PhotoRequestInfo',
		array('idPhotoRequest'=>$idPhotoRequest, 'class'=>'right-panel-map'));
} ?>

<div id="map_canvas" style="overflow: visible important!;">
</div><!-- map -->

<div class="index_middle_container alert in alert-info" style="border-top: 1px solid; margin-bottom: 5px">
	Couldn't you find the photo you were looking for? Very soon you will be able to insert your photo request on this page and
	our photographers will provide it for you.<br>
	Right now, all requests have been made by GeoStockPhoto. We assure you that <b><u>we will buy your photos</u></b>.
</div>