var top5=null;

function ajaxFunctionProductInfo(url, idProduct, lat, lng, src){
	//open_right_panel();
	var ajaxRequest;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
	if(lat!=null & lng!=null)
		moveMarker(lat, lng, mapSmall);
	else
		ajaxMoveMarker(idProduct);

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('info_photo');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			$(function(){
				$('a.lightbox').lightBox();
			})
			// Ho commentato la verifica se il marker è già presente
			// perchè così posso riportarlo in primo piano se è stato nascosto
			/*var checkMarker = false;
			for(j in markersClstrTop){
				if(src==markersClstrTop[j].getIcon().url){
					checkMarker = true;
				}
			}
			if(!checkMarker)*/
			if(idProduct!=null & src!=null){
				//var urlAjax = yii.urls.showInfoPhoto+"/id/"+result.topPhotos[i].id;
				createMarkerCircle(idProduct, src, lat, lng, null, url);
			}
		}if(ajaxRequest.readyState != 4){
			var ajaxDisplay = document.getElementById('info_photo');
			ajaxDisplay.innerHTML="<div style='text-align: center; margin-top: 75px; margin-bottom: 75px;'><img src='"+yii.urls.base+"/images/ajax-loader.gif' alt='waiting load' height='150' width='150'></div>";
		}
	}
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function ajaxFunctionGeneric(url, div, redirect){
	var ajaxRequest;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			if(redirect!=null){
				location.href=redirect;
			}else{
				var ajaxDisplay = document.getElementById(div);
				ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
		}
	}
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function crop(evt, idProduct){
	var coordinates=getCoordinate(evt);
	if(coordinates[0]==null | coordinates[1]==null){
		alert('Something went wrong while cropping the photo');
	}else{
		var idCropImg = document.getElementById('crop_img');
		idCropImg.src=yii.urls.photoCrop+'/idProduct/'+idProduct+'/x/'+coordinates[0]+'/y/'+coordinates[1];
		if(document.getElementById('Reviews_checkCrop')!=null)
			document.getElementById('Reviews_checkCrop').checked = true;
	}
}

function getCoordinate(evt){
	var img_x;
	var img_y;
	if (document.all) { // MSIE
		img_x = evt.offsetX;
		img_y = evt.offsetY;
	} else { // Netscape, etc.
		img_x = evt.pageX; //clientX
		img_y = evt.pageY; //clientY
		for (var offMark = evt.target; offMark; offMark = offMark.offsetParent) {
			img_x -= offMark.offsetLeft;
		}
		for (var offMark = evt.target; offMark; offMark = offMark.offsetParent) {
			img_y -= offMark.offsetTop;
		}
	}
	coordinates= new Array(img_x, img_y);
	return coordinates;
}

function ajaxFuncGenFade(url, div, jsFuncToCall){
	var ajaxRequest;

	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById(div);
			$('#photo-line-container').fadeOut(500);
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			$('#photo-line-container').fadeIn(500);
		}
	}
	
	if(jsFuncToCall!=null){
		url = url+jsFuncToCall();
	}
	
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function getZoomAndParams(){
	if(map!=null){
		var zoom = map.getZoom();
		return getParams(zoom);
	}
}

function getParams(zoom){
	var params = getParamsMap();
	params = params+'/zoom/'.concat(zoom);
	if(document.getElementById("username")!=null)
		if(document.getElementById("username").value!=""){
			params=params+'/user/'.concat(document.getElementById("username").value);
		}
	if(document.getElementById("rate")!=null)
		if(document.getElementById("rate").value>1){
			params=params+'/rate/'.concat(document.getElementById("rate").value);
		}
	if(document.getElementById("idSize")!=null)
		if(document.getElementById("idSize").value>1){
			params=params+'/size/'.concat(document.getElementById("idSize").value);
		}
	if(document.getElementById("idCategory1")!=null)
		if(document.getElementById("idCategory1").value!=""){
	    	params=params+'/cat/'.concat(document.getElementById("idCategory1").value);
		}
	if(document.getElementById("idLicense")!=null)
		if(document.getElementById("idLicense").value!=""){
	    	params=params+'/lic/'.concat(document.getElementById("idLicense").value);
		}
	/*if(document.getElementById("minPrice").value!="min" & document.getElementById("minPrice").value!=""){
		params=params+'/minp/'.concat(document.getElementById("minPrice").value);
	}
	if(document.getElementById("maxPrice").value!="max" & document.getElementById("maxPrice").value!=""){
		params=params+'/maxp/'.concat(document.getElementById("maxPrice").value);
	}
	if(document.getElementById("keywords").value!="Keywords" & document.getElementById("keywords").value!=""){
		params=params+'/kw/'.concat(document.getElementById("keywords").value);
	}*/
	return params;
}

function getParamsMap(){
	var bounds = map.getBounds();
	var latNE = bounds.getNorthEast().lat();
	var lngNE = bounds.getNorthEast().lng();
	var latSW = bounds.getSouthWest().lat();
	var lngSW = bounds.getSouthWest().lng();
	var params = "/latSW/".concat(latSW)+'/lngSW/'.concat(lngSW)+'/latNE/'.concat(latNE)+'/lngNE/'.concat(lngNE);
	return params;
}

function createMarkerCircle(idProduct, src, lat, lng, url, urlAjax){
	var icon = new google.maps.MarkerImage(src,
		// This marker is 20 pixels wide by 32 pixels tall.
		new google.maps.Size(69,80),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 0,32.
		new google.maps.Point(29,75)
	);
	var marker_shape = {coords: [33,30,30], type: "circle"}
    var point = new google.maps.LatLng(lat, lng);
	if(url!=null){
		url=url+'/'+idProduct;
	}
	var marker = createMarker(point, map, idProduct, icon, marker_shape, url, urlAjax);
	markersClstrTop.push(marker);
}

var orderByMoveMap="best";
function ajaxFunctionUpdate(idPhotoType, getTop5){
	var zoom = map.getZoom()
	var ajaxRequest;
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var runTop5=false;
			var result = JSON.parse(ajaxRequest.responseText);
			
			var ajaxDisplay = document.getElementById('cntPhotosMap');
			if(ajaxDisplay!=null){
				var totCnt = result.totCntAllPhotos;
				if(totCnt>=250)
					var text = "More than 250 photos";
				else if(totCnt==1)
					var text = "Only 1 photo";
				else
					var text = totCnt+" photos";
				ajaxDisplay.innerHTML = text;
			}
			
			if(top5==null)
				runTop5=true;
			else if(top5.length!=result.countTopFive)
				runTop5=true;
			else
				for(var i=0; i<result.countTopFive; i++){
					if(top5[i].id!=result.topFive[i].id & !runTop5)
						runTop5=true;
				}
			
			if(runTop5 && getTop5){
				var newTop5 = result.topFive;
				if(newTop5!=null){
					params='';
					for(var i=0; i<newTop5.length; i++){
						params=params+'/id'+i+'/'+newTop5[i].id;
					}
					var url = yii.urls.photoTopTen+'Fast'+params+'/offsetNext/'+result.offsetNext;
					top5=newTop5;
				}else{
					top5=null;
					if(params==null){
						var params = getParams(zoom);
					}
					var url = yii.urls.photoTopTen+params+'/idPhotoType/'+idPhotoType+'/offset/'+result.offsetNext;
				}
				ajaxFuncGenFade(url, 'photo-line');
			}
			
			for (i in markersClstr) {
				markersClstr[i].setMap(null);
			}
			markersClstr = [];
			
			var keepCluster=false;
			for(var j=0; j<markersClstrTop.length; j++){
				keepCluster=false;
				//alert('check'+markersClstrTop[j].getIcon().url);
				for(var i=0; i<result.topPhotos.length; i++) {
					if(result.topPhotos[i].src==markersClstrTop[j].getIcon().url){
						keepCluster=true;
						result.topPhotos.splice(i,1);
					}
				}
				if(!keepCluster){
					//alert('remove'+markersClstrTop[j].getIcon().url);
					markersClstrTop[j].setMap(null);
					markersClstrTop.splice(j,1);
					j--;
				}
			}
			for(var i=0; i<result.topPhotos.length; i++) {
				var urlAjax = yii.urls.showInfoPhoto+"/id/"+result.topPhotos[i].id;
				createMarkerCircle(result.topPhotos[i].id, result.topPhotos[i].src, result.topPhotos[i].lat, result.topPhotos[i].lng, null, urlAjax);
		    }
			printSmallMarkers(result.count, result.photos, null, yii.urls.showInfoPhoto);
		}
	}
	
	params=getParams(zoom);
	
	var url = yii.urls.updateMap+params+'/idPhotoType/'+idPhotoType+'/orderBy/'+orderByMoveMap;
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

// Get Position of a photo and move marker
function ajaxMoveMarker(idProduct){
	var ajaxRequest;
	var url = yii.urls.photoGetPosition+"/idProduct/"+idProduct;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var result = JSON.parse(ajaxRequest.responseText);
			moveMarker(result.lat, result.lng, mapSmall);
		}
	}
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function ajaxFunctionUpdateUser(){
	var zoom = map.getZoom();
	var ajaxRequest;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var result = JSON.parse(ajaxRequest.responseText);

			if(top5==null)
				runTop5=true;
			else if(top5.length!=result.countTopFive)
				runTop5=true;
			else
				for(var i=0; i<result.countTopFive; i++){
					if(top5[i].id!=result.topFive[i].id & !runTop5)
						runTop5=true;
				}
			
			if(runTop5){
				var newTop5 = result.topFive;
				if(newTop5!=null){
					params='';
					for(var i=0; i<newTop5.length; i++){
						params=params+'/id'+i+'/'+newTop5[i].id;
					}
					var url = yii.urls.userTopFive+'Fast'+params+'/offsetNext/'+result.offsetNext;
					top5=newTop5;
				}else{
					top5=null;
					if(params==null){
						var params = getParamsMap();
					}
					var url = yii.urls.userTopFive+params+'/offset/'+result.offsetNext;
				}
				ajaxFuncGenFade(url, 'photo-line');
			}
			
			for (i in markersClstr) {
				markersClstr[i].setMap(null);
			}
			markersClstr = [];
			
			var keepCluster=false;
			for(var j=0; j<markersClstrTop.length; j++){
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
					j--;
				}
			}
			for (var i=0; i<result.topPhotos.length; i++) {
				var urlAjax = yii.urls.showInfoUser+"/id/"+result.topPhotos[i].id;
				createMarkerCircle(result.topPhotos[i].id, result.topPhotos[i].src, result.topPhotos[i].lat, result.topPhotos[i].lng, null, urlAjax);
		    }
			//printSmallMarkers(result.topPhotos.length, result.topPhotos, yii.urls.userView);
			printSmallMarkers(result.count, result.photos, null, yii.urls.showInfoUser);
		}
	}
	
	params=getParamsMap();
	var url = yii.urls.updateMapUser+params+'/orderBy/'+orderByMoveMap;
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function ajaxFunctionUpdatePhotoRequest(){
	var ajaxRequest;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var result = JSON.parse(ajaxRequest.responseText);
			printSmallMarkers(result.count, result.photoRequests, null, yii.urls.showInfoPhotoRequest);
		}
	}
	
	params=getParamsMap();
	var url = yii.urls.updateMapPhotoRequest+params;
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function ajaxFunctionUpdateMapHome(idPhotoType){
	var zoom = map.getZoom();
	var ajaxRequest;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var result = JSON.parse(ajaxRequest.responseText);
			
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
			url = yii.urls.photoView;
			for (var i=0; i<result.topPhotos.length; i++) {
				createMarkerCircle(result.topPhotos[i].id, result.topPhotos[i].src, result.topPhotos[i].lat, result.topPhotos[i].lng, url, null);
		    }
			printSmallMarkers(result.count, result.photos, url, null);
		}
	}
	
	params=getParams(zoom);
	
	var url = yii.urls.updateMap+params+'/idPhotoType/'+idPhotoType;
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}

function printSmallMarkers(count, array, url, urlAjax_in){
	for(var i=0; i<count; i++){
		var urlAjax;
    	var id = array[i].id;
    	var icon = yii.urls.base+"/images/marker_s_logo.png";
        var point = new google.maps.LatLng(array[i].lat, array[i].lng);
        if(url!=null){
        	urlAjax=null;
        	if(array[i].username!=null)
        		url=url+'/'+array[i].username;
        	else
        		url=url+'/'+id;
        }else{
    		urlAjax = urlAjax_in+"/id/"+id;
        }
		var marker = createMarker(point, map, id, icon, null, url, urlAjax);
		markersClstr.push(marker);
	}
}

function createMarker(point, map, idProduct, icon, marker_shape, url, urlAjax){
	var markerInner = new google.maps.Marker({
		'position': point,
		'icon': icon,
		'map': map,
		//'shadow': shadow,
		'shape': marker_shape,
	});
	google.maps.event.addListener(markerInner, 'click', function() {
		if(urlAjax!=null){
			ajaxFunctionProductInfo(urlAjax, null, point.lat(), point.lng(), null);
			url = null;
		}else{
			window.location.assign(url);
		}
	});
	return markerInner;
}

function updateProductInfo(field){
	var urlAjax = yii.urls.showInfoPhoto+"/id/"+field.innerHTML;
	ajaxFunctionProductInfo(urlAjax, field.innerHTML, null, null, null);
}
