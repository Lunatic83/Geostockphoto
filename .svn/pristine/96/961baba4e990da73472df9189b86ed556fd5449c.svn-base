function make_blank(field){
	var test = field.value;
	if(test=="lat" || test=="lng" || test=="min" || test=="max" || test=="dd" || test=="mm" || test=="yyyy")
		field.value ="";
	else if(test=="insert here comma-separated keywords"){
		field.value ="";
		field.style.color="black";
	}
	else if(test=="Search location..."){
		field.value ="";
		field.style.color="black";
	}
	else if(test=="Photographer"){
		field.value ="";
		field.style.color="black";
	}
	else if(test=="Keywords"){
		field.value ="";
		field.style.color="black";
	}
}

function codeAddressIndex(address, mapName) {
	if(mapName==null)
		mapName=map;
	geocoder.geocode( { 'address': address},
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				mapName.setCenter(results[0].geometry.location);
				mapName.fitBounds(results[0].geometry.viewport);
			} else {
				//alert("Geocode was not successful for the following reason: " + status);
			}
		}
	);
}

function submitenter(e, func, value, redirect, moveTop){
	var keycode;
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	else return true;
	
	if (keycode == 13){
		submitPostEnter(func, redirect, value, moveTop);
		return false;
	}
	return true;
}

function submitPostEnter(func, redirect, value, moveTop){
	if(redirect){
		if(value!=""){
			value=value.replace(/\D\W/g, "_");
			location.href=yii.urls.loc+value;
		}else{
			location.href=yii.urls.photoMap;
		}
	}
	
	if(document.getElementById("map_canvas")!=null)
		func(value, map);
	else
		func(value, mapSmall);
	
	if(moveTop!=null && moveTop)
		$("html, body").animate({ scrollTop: 0 }, "slow");

	togglePopover();
}

function changeCategories(selection){
	if(document.getElementById("PhotoPrePost_idPhotoType").value==2){
		document.getElementById("categories").style.display='none';
		document.getElementById("categoriesBN").style.display='';
		if(selection==2){
			document.getElementById("categories2").style.display='none';
			document.getElementById("categoriesBN2").style.display='';
		}
	}else{
		document.getElementById("categories").style.display='';
		document.getElementById("categoriesBN").style.display='none';
		if(selection==2){
			document.getElementById("categories2").style.display='';
			document.getElementById("categoriesBN2").style.display='none';
		}
	}
}


$(document).ready(function(){
	//hide_right_panel(event);
	$('.arrow-button').click(function(event){
		event.stopPropagation();
		hide_right_panel(event);
	})
	$('.tabs .right').click(function(){
		$('.tabs .right').css('background-color', '#FFC345');
		$('.tabs .left').css('background-color', '#999');
		$('.tabs .right').css('color', 'black');
		$('.tabs .left').css('color', 'white');
		$('.best').fadeOut(500, function(){
			$('.last').fadeIn();
		})
	})
	$('.tabs .left').click(function(){
		$('.tabs .right').css('background-color', '#999');
		$('.tabs .left').css('background-color', '#FFC345');
		$('.tabs .right').css('color', 'white');
		$('.tabs .left').css('color', 'black');
		$('.last').fadeOut(500, function(){
			$('.best').fadeIn();
		})
	})
})

function open_right_panel(){
	if($('.arrow-button').attr('src') == yii.urls.base+'/images/left_grey.png'){
		$('#right-panel-map').animate({
			width: 275
		});
		$('#right-panel-map').css('height', 'auto');
		$('#right-panel-map .wrapper').fadeIn(500, function(){
			$('.arrow-button').fadeOut(500, function(){
				$('.arrow-button').attr('src', yii.urls.base+'/images/right_grey.png').fadeIn(500);
			});
		});
	}else
		return 1
}

function hide_right_panel(event){
	$('#right-panel-map').fadeIn(1000);
	
	if(open_right_panel()){
		$('#right-panel-map').css('height', $('#right-panel-map').css('height'));
		$('#right-panel-map .wrapper').fadeOut(500, function(){
			$('.arrow-button').fadeOut(500, function(){
				$('.arrow-button').attr('src', yii.urls.base+'/images/left_grey.png').fadeIn(500);;
			});
			$('#right-panel-map').animate({
				width: 40
			})
		});
	}
}

function togglePopover(){
	var advsrc = $('#advanced-search-popover').parent().parent().parent().parent();
	advsrc.css('margin-left','-160px');
	
	if(advsrc.css('display')=='block'){
		advsrc.css('display','none');		
	}else {
		advsrc.css('display','block');
	}
	
}

function viewIncrementCount(url, id){
	$.ajax({
		url: url+'/photo/ajaxViewIncrementCount/id/'+id,
		type: "GET",
		async: false,
	    success: function(response){			    	
	    	$('#photo-views-count').text(response);
		}
	});
}
