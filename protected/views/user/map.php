<?php if($idUser!=null){
	$this->widget('application.components.widgets.UserInfo',
		array('idUser'=>$idUser, 'class'=>'right-panel-map'));
} ?>

<div id="map_canvas" style="overflow: visible important!">
</div><!-- map -->

<div id="photo-line">
</div>
