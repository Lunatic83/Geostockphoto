var map;
var mapSmall;
var marker;
var markersClstr = [];
var markersClstrTop=[];
var geocoder = new google.maps.Geocoder();

function initializeMapSmallBasic(lat, lng, zoom, draggable) {
	var marker_visible = true;
	
	if(lat!=null && lng!=null){
		var latlng = new google.maps.LatLng(lat, lng);
		var myOptions = {       
			zoom: 16,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.HYBRID,
	  		streetViewControl: false,
	  		scaleControl: false,
		};
	}else{
		if(zoom==null)
			zoom=0;
		var latlng = new google.maps.LatLng(2, 13);
		var myOptions = {      
			zoom: zoom,
			center: latlng,
	  		streetViewControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		marker_visible = false;
	}
	
	mapSmall = new google.maps.Map(document.getElementById("map_canvas_small"), myOptions);
	
	var icon = yii.urls.base+"/images/marker_s_logo.png";
	marker = new google.maps.Marker({
		position: latlng,
		map: mapSmall,
		draggable: draggable,
		icon: icon,
		visible: marker_visible
	});
}

function initializeMapSmall(lat, lng, zoom) {
	initializeMapSmallBasic(lat, lng, zoom, true);
						
	google.maps.event.addListener(marker, "dragend", function() { 
		var point = marker.getPosition();
		document.getElementById("PhotoPrePost_lat").value = point.lat();
		document.getElementById("PhotoPrePost_lng").value = point.lng();
	});
						
	google.maps.event.addListener(mapSmall, "click", function(event) {
		document.getElementById("PhotoPrePost_lat").value = event.latLng.lat();
		document.getElementById("PhotoPrePost_lng").value = event.latLng.lng();
		marker.setPosition(event.latLng);
		marker.setVisible(true);
	});
}

function initializeMapSmallPhotographer(lat, lng, zoom) {
	initializeMapSmallBasic(lat, lng, zoom, true);
	
	google.maps.event.addListener(marker, "dragend", function() { 
		var point = marker.getPosition();
		if(document.getElementById("User_lat")!=null){
			document.getElementById("User_lat").value = point.lat();
			document.getElementById("User_lng").value = point.lng();
		}else if(document.getElementById("ConfGroups_lat")!=null){
			document.getElementById("ConfGroups_lat").value = point.lat();
			document.getElementById("ConfGroups_lng").value = point.lng();
		}
	});
						
	google.maps.event.addListener(mapSmall, "click", function(event) {
		if(document.getElementById("User_lat")!=null){
			document.getElementById("User_lat").value = event.latLng.lat();
			document.getElementById("User_lng").value = event.latLng.lng();
		}else if(document.getElementById("ConfGroups_lat")!=null){
			document.getElementById("ConfGroups_lat").value = event.latLng.lat();
			document.getElementById("ConfGroups_lng").value = event.latLng.lng();
		}
		marker.setPosition(event.latLng);
		marker.setVisible(true);
	});
}

function initializeMapSmallStatic(lat, lng, zoom) {
	initializeMapSmallBasic(lat, lng, zoom, false);
}

function resetMapIndex(idPhotoType){
	document.getElementById("username").value="";
	document.getElementById("rate").value=1;
	document.getElementById("idSize").value=1;
	document.getElementById("idCategory1").value="";
	document.getElementById("idLicense").value="";
	for(i=1; i<=5; i++){
		if(i>1)
			document.images['stella'+i].src = yii.urls.base+"/images/star_grey.png";
		else
			document.images['stella'+i].src = yii.urls.base+"/images/star_yellow.png";
	}

	var latlng = new google.maps.LatLng(45, 30);
	map.setCenter(latlng);
	map.setZoom(2);
	
	ajaxFunctionUpdate(idPhotoType);
}

function initializeMapBasic(lat, lng, zoom, location){
	if(lat==null || lng==null)
		var latlng = new google.maps.LatLng(35, 30);
	else
		var latlng = new google.maps.LatLng(lat, lng);
	if(zoom==null)
		zoom=2;
	var myOptions = {       
		zoom: zoom,
		minZoom: 2,
		center: latlng,
		//ROADMAP, SATELLITE, HYBRID, TERRAIN
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	    mapTypeControlOptions: {
	    	// DEFAULT , DROPDOWN_MENU , HORIZONTAL_BAR 
	        //style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
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

	if(location!="")
		codeAddressIndex(location, map);
}

function initializeMapIndexDistr(lat, lng, user, location, idPhotoType, zoom){
	initializeMapBasic(null, null, zoom, location);
	if(lat!=1000 && lng!=1000)
  		initializeMapSmallStatic(lat, lng, null, true);
	
	var divCnt=document.getElementById('countPhotos')
	map.controls[google.maps.ControlPosition.LEFT_TOP].push(divCnt);

	google.maps.event.addListener(map, 'idle', function(){ajaxFunctionUpdate(idPhotoType, 1);});
	
	initPopoverAdvancedSearch();
}

function initializeMapRequest(lat, lng, location){
	initializeMapBasic(lat, lng, null, location);
	if(lat!=1000 && lng!=1000)
  		initializeMapSmallStatic(lat, lng, null, true);
	google.maps.event.addListener(map, 'idle', function(){ajaxFunctionUpdatePhotoRequest();});
}

function initializeMapUser(lat, lng, location){
	initializeMapBasic(lat, lng, null, location);
	if(lat!=1000 && lng!=1000)
  		initializeMapSmallStatic(lat, lng, null, true);
	google.maps.event.addListener(map, 'idle', function(){ajaxFunctionUpdateUser();});
}

function initializeMapHome(lat, lng, user, location, idPhotoType, zoom){
	initializeMapBasic(lat, lng, zoom, location);
	if(lat!=1000 && lng!=1000)
  		initializeMapSmallStatic(lat, lng, null, true);
	google.maps.event.addListener(map, 'idle', function(){ajaxFunctionUpdateMapHome(idPhotoType);});
}

function codeAddress(address, mapName){
	if(mapName==null)
		mapName=map;
	geocoder.geocode( { 'address': address},
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				mapName.setCenter(results[0].geometry.location);
				marker.setPosition(results[0].geometry.location);
				if(document.getElementById("PhotoPrePost_lat")!=null){
					document.getElementById("PhotoPrePost_lat").value = 'invalid';
					document.getElementById("PhotoPrePost_lng").value = 'invalid';
				}else if(document.getElementById("User_lat")!=null){
					document.getElementById("User_lat").value = results[0].geometry.location.lat();
					document.getElementById("User_lng").value = results[0].geometry.location.lng();
				}else if(document.getElementById("ConfGroups_lat")!=null){
					document.getElementById("ConfGroups_lat").value = results[0].geometry.location.lat();
					document.getElementById("ConfGroups_lng").value = results[0].geometry.location.lng();
				}
				marker.setVisible(false);
				map.fitBounds(results[0].geometry.viewport);
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		}
	);
}

function moveMarker(lat, lng, mapVar) {
	if(lat==null || lng==null || lat=="" || lng==""){
		var latlng = new google.maps.LatLng(22, 13);
		mapVar.setZoom(0);
		mapVar.setCenter(latlng);
		marker.setPosition(latlng);
		marker.setVisible(false);
	}else{
		var latlng = new google.maps.LatLng(lat, lng);
		mapVar.setZoom(16);
		mapVar.setCenter(latlng);
		marker.setPosition(latlng);
		marker.setVisible(true);
	}
}

function initPopoverAdvancedSearch(){
	$('#advanced-search').popover('show');
	var popOverElement= $('#advanced-search-popover').parent().parent().parent().parent();
	popOverElement.css('display','none');
	var newLeft=popOverElement.css('left')-154;
	popOverElement.css('display',newLeft);
}

function removeMapPosition(){
	var markersArray = [];
	google.maps.Map.prototype.clearOverlays = function() {
		for (var i = 0; i < markersArray.length; i++ ) {
	    	markersArray[i].setMap(null);		    
	  	}
	}
	markersArray.push(marker);
	google.maps.event.addListener(marker,"click",function(){});
	google.maps.Map.prototype.clearOverlays();
	$('#User_lat').val('');
	$('#User_lng').val('');
	initializeMapSmallPhotographer(null, null, 1);
}