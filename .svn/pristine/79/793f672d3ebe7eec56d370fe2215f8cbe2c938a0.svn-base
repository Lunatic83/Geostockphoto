var map;
var marker;
var markersClstr=[];
var markersClstrTop=[];
var geocoder = new google.maps.Geocoder();

function initializeGeoStockPhotoMap(apiKey, lat, lng, zoom, user, location){
	if(lat!=null && lng!=null)
		var latlng = new google.maps.LatLng(lat, lng);
	else
		var latlng = new google.maps.LatLng(35, 30);
	
	if(zoom==null)
		zoom=2;
	
	var myOptions = {       
		zoom: zoom,
		minZoom: 2,
		center: latlng,
		//ROADMAP, SATELLITE, HYBRID, TERRAIN
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	    mapTypeControlOptions: {
	        position: google.maps.ControlPosition.TOP_LEFT
	    },
  		streetViewControl: false,
	    panControlOptions: {
	        position: google.maps.ControlPosition.LEFT_CENTER
	    },
	    zoomControlOptions: {
	        position: google.maps.ControlPosition.LEFT_CENTER
	    },
  		scaleControl: true,
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	if(location!="" && location!=null){
		codeAddress(location);
	}
	
	google.maps.event.addListener(map, 'idle', function(){ajaxFunctionUpdate(user, apiKey);});
}

function ajaxFunctionUpdate(user, apiKey){
	var zoom = map.getZoom();
	params=getParams(zoom, user);
	var url = 'http://www.geostockphoto.com/photo/updateMapSemp/apiKey/'+apiKey+params;
	callOtherDomain(url);
}

function getParams(zoom, user){
	var bounds = map.getBounds();
	var latNE = bounds.getNorthEast().lat();
	var lngNE = bounds.getNorthEast().lng();
	var latSW = bounds.getSouthWest().lat();
	var lngSW = bounds.getSouthWest().lng();
	
	var params = "/latSW/".concat(latSW)+'/lngSW/'.concat(lngSW)+'/latNE/'.concat(latNE)+'/lngNE/'.concat(lngNE)+'/zoom/'.concat(zoom);
	if(user!=null)
		params=params+'/user/'+user;
	
	return params;
}

function printSmallMarkersEdit(result){
	for (var i = 0; i < result.count; i++) {
    	var idProduct = result.photos[i].id;
    	var src = "http://www.geostockphoto.com/images/marker_s_logo.png";
    	var icon = new google.maps.MarkerImage(src);
        var point = new google.maps.LatLng(result.photos[i].lat, result.photos[i].lng);
		var marker = createMarker(point, map, idProduct, icon, null);
		markersClstr.push(marker);
	}	
}

function createMarker(point, map, idProduct, icon, marker_shape){
	var markerInner = new google.maps.Marker({
		'position': point,
		'icon': icon,
		'map': map,
		'shape': marker_shape,
	});
	google.maps.event.addListener(markerInner, 'click', function() {
		var url = "http://www.geostockphoto.com/photo/view/"+idProduct;
		window.open(url);
	});
	return markerInner;
}

function createMarkerCircle(idProduct, src, lat, lng){
	var icon = new google.maps.MarkerImage(src,
		new google.maps.Size(69,80),
		new google.maps.Point(0,0),
		new google.maps.Point(29,75)
	);
	var marker_shape = {coords: [33,30,30], type: "circle"}
    var point = new google.maps.LatLng(lat, lng);
	var marker = createMarker(point, map, idProduct, icon, marker_shape);
	markersClstrTop.push(marker);
}

function codeAddress(address){
	geocoder.geocode( { 'address': address},
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				map.fitBounds(results[0].geometry.viewport);
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		}
	);
}

function outputResult(){
	var result = JSON.parse(invocation.responseText);
	for (i in markersClstr) {
		markersClstr[i].setMap(null);
	}
	markersClstr = [];
	
	var keepCluster=false;
	for(j in markersClstrTop){
		keepCluster=false;
		for(var i=0; i<result.topPhotos.length; i++) {
			if(result.topPhotos[i].src==markersClstrTop[j].getIcon().url){
				keepCluster=true;
				result.topPhotos.splice(i,1);
			}
		}
		if(!keepCluster){
			markersClstrTop[j].setMap(null);
			markersClstrTop.splice(j,1);
		}
	}
	
	for(var i=0; i<result.countTopPhotos; i++){
		createMarkerCircle(result.topPhotos[i].id, result.topPhotos[i].src, result.topPhotos[i].lat, result.topPhotos[i].lng);
    }
	printSmallMarkersEdit(result);
}