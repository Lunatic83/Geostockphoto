<div class="container margin-top-bottom">
	<div class="well background_box" style="text-align: justify">
		<h1>Load GeoStockPhoto Map</h1>
		GeoStockPhoto offers you an <b>easy</b> way to load our map on your website in 3 simple steps.<br>
		Use of this service is within the terms of use described in the <a href="<?php echo Yii::app()->createUrl('site/api')?>">GeoStockPhoto API page</a>.
		Go there in order to get you personal <i>apiKey</i> required to load the map.
		<h5>Step 1</h5>
		Load 3 javascript files by adding the following lines in the <i>head</i> section of your website:<br>
		<div class="alert in alert-block fade alert-warning" style="margin: 5px">
			&#60;script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"&rsaquo;&lsaquo;/script&#62;<br>
			&#60;script type="text/javascript" src="http://geostockphoto.com/js/api/crossDomainReq.js"&rsaquo;&lsaquo;/script&#62;<br>
			&#60;script type="text/javascript" src="http://geostockphoto.com/js/api/mapEdit.js"&rsaquo;&lsaquo;/script&#62;
		</div>
		<h5>Step 2</h5>
		Create a <i>div</i> element (with id="map_canvas") in the page you want to load our map.
		<div class="alert in alert-block fade alert-warning" style="margin: 5px">
			&#60;div id="map_canvas" style="width: 900px; height: 450px"&#62;&#60;/div&#62;
		</div>
		You must specify <i>width</i> and <i>length</i> of this element.
		<h5>Step 3</h5>
		Call the <i>initializeGeoStockPhotoMap</i> on your <i>body onload</i>:
		<div class="alert in alert-block fade alert-warning" style="margin: 5px">
			&#60;body onload="initializeGeoStockPhotoMap('<i>yourApiKey</i>')"&#62;
		</div>
		This javascript function accept the arguments listed in the following table.
		<table class="table table-bordered table-striped table-condensed" style="width:900px; margin-top: 10px">
			<thead>
				<tr>
					<td><b>Argument</b></td>
					<td><b>Type</b></td>
					<td style="width: 100px"><b>Valid Values</b></td>
					<td><b>Default Value</b></td>
					<td><b>Required</b></td>
					<td><b>Description</b></td>
				</tr>
			</thead>
			<tr>
				<td>apiKey</td>
				<td>string</td>
				<td>valid api key</td>
				<td>none</td>
				<td>yes</td>
				<td>Your personal api key.</td>
			</tr>
			<tr>
				<td>lat</td>
				<td>float</td>
				<td>-85 to 85</td>
				<td>35</td>
				<td>no</td>
				<td>Latitude of the center of the map.</td>
			</tr>
			<tr>
				<td>lng</td>
				<td>float</td>
				<td>-180 to 180</td>
				<td>30</td>
				<td>no</td>
				<td>Longitude of the center of the map.</td>
			</tr>
			<tr>
				<td>zoom</td>
				<td>int</td>
				<td>2 to 16</td>
				<td>2</td>
				<td>no</td>
				<td>Zoom of the map.</td>
			</tr>
			<tr>
				<td>user</td>
				<td>string</td>
				<td>existing username</td>
				<td>none</td>
				<td>no</td>
				<td>Return only photos of a specific author.</td>
			</tr>
			<tr>
				<td>location</td>
				<td>string</td>
				<td>existing location</td>
				<td>none</td>
				<td>no</td>
				<td>Center and zoom the map at this specific location. If the argument is given, lat, lng and zoom
					will note be considered.</td>
			</tr>
		</table>
	</div>
</div>