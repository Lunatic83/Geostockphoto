/**
 * @author Marco
 */

function editSelectionJson(url, idProduct, index){
	document.getElementById("msg_error").style.display='none';
	document.getElementById("msg_error").innerHTML="";
	document.getElementById("msg_success").style.display='none';
	
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
	
	if(idProduct!=null && index!=null)
		selectionJSON = checkSelectionJSON(idProduct, index);
	else
		selectionJSON = selectAllJSON();
	count = readCount();
	var params = "selectionJSON="+selectionJSON+"&count="+count;
	
	ajaxRequest.open("POST", url, true);
	
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			if(ajaxRequest.responseText!=''){
				var myObject = eval('(' + ajaxRequest.responseText + ')');
				if(myObject.model.title==null)
					document.getElementById("ProductPrePost_title").value="";
				else
					document.getElementById("ProductPrePost_title").value=myObject.model.title;
				if(myObject.model.idCategory1!=null && myObject.model.idCategory1!="")
					selectItemByValue(document.getElementById("PhotoPrePost_idCategory1"), myObject.model.idCategory1);
				else
					document.getElementById("PhotoPrePost_idCategory1").options[0].selected='1';
				//document.getElementById("PhotoPrePost_shootingDate").value=myObject.model.shootingDate;
				if(myObject.model.lat!=null)
					document.getElementById("PhotoPrePost_lat").value=myObject.model.lat;
				else{
					document.getElementById("PhotoPrePost_lat").value="";
				}
				if(myObject.model.lng!=null)
					document.getElementById("PhotoPrePost_lng").value=myObject.model.lng;
				else
					document.getElementById("PhotoPrePost_lng").value="";
				document.getElementById("cnt_img_selected").innerHTML=myObject.cnt_img_selected;
				moveMarker(myObject.model.lat, myObject.model.lng, map);
			}
		}
	}
	ajaxRequest.send(params);
	checkShowSidebar();
}

function selectItemByValue(elmnt, value){
    for(var i=0; i < elmnt.options.length; i++){
      if(elmnt.options[i].value == value)
        elmnt.selectedIndex = i;
    }
}

function duplicate(position){
	if(position=='top')
		document.getElementById('termsAccepted').checked = document.getElementById('termsAccepted_top').checked;
	else
		document.getElementById('termsAccepted_top').checked = document.getElementById('termsAccepted').checked;
}

function submitted(xhr, url, divError, divSuccess){
	if(xhr.responseText!=''){
		var myObject = eval('('+xhr.responseText+')');
		if(myObject.status){
			if(url!='null'){
				location.href=url;
			}else{
				if(myObject.success_msg!=null)
					document.getElementById(divSuccess).innerHTML=myObject.success_msg;
				document.getElementById(divSuccess).style.display='';
			}
		}else{
			document.getElementById(divError).innerHTML=myObject.error_msg;
			document.getElementById(divError).style.display='';
		}
	}
}

function selection(id, index){
	if(document.getElementById("SelectedPhoto_selection_"+index).value==""){
		showSidebar();
		document.getElementById("SelectedPhoto_selection_"+index).value=id;
		if(document.getElementById("SelectedPhoto_selection_del_"+index)!=null){
			document.getElementById("SelectedPhoto_selection_del_"+index).value=id;
		}
			
		document.getElementById(id).style.border = "3px solid #FFC345";
		return id;
	}else{
		document.getElementById("SelectedPhoto_selection_"+index).value="";
		if(document.getElementById("SelectedPhoto_selection_del_"+index)!=null) 
			document.getElementById("SelectedPhoto_selection_del_"+index).value="";
		document.getElementById(id).style.border = "2px solid black";
		return "";
	}
}

function deSelect(index){
	id=retrieveValue(index);
	if(id!=''){
		document.getElementById("SelectedPhoto_selection_"+index).value='';
		if(document.getElementById("SelectedPhoto_selection_del_"+index)!=null) 
			document.getElementById("SelectedPhoto_selection_del_"+index).value='';
		document.getElementById(id).style.border = "2px solid black";
	}
	return "";
}

function select(index, id){
	if(id!=0){
		showSidebar();
		document.getElementById("SelectedPhoto_selection_"+index).value=id;
		if(document.getElementById("SelectedPhoto_selection_del_"+index)!=null) 
			document.getElementById("SelectedPhoto_selection_del_"+index).value=id;;
		document.getElementById(id).style.border = "3px solid #FFC345";
		return id;
	}else{
		return '';
	}
}

function moveAndSelect(id){
	if(id!=0){
		old_id=document.getElementById("idSelected").value;
		if(old_id!=id){
			document.getElementById("idSelected").value=id;
			document.getElementById('id'+id).style.border = "3px solid #FFC345";
			document.getElementById('id'+old_id).style.border = "2px solid black";
			if(document.getElementById('SO_'+old_id)!=null){
				document.getElementById('SO_'+old_id).style.display="none";
				document.getElementById('SO_'+id).style.display="";
			}
		}
		return id;
	}
	return '';
}

function retrieveValue(index){
	img=document.getElementById("SelectedPhoto_selection_"+index).value;
	return img;
}

function addJSONelement(JSONstring, index, value){
	if(JSONstring=="{")
		separator = "";
	else
		separator = ",";
	if(value=="")
		value = "\"\"";
	return JSONstring = JSONstring + separator + "\"" + index + "\"" + ":" + value;
}

function deselectAll(){
	count=document.getElementById("SelectedPhoto_count").value;
	
	for(index=1; index<=count; index++){
		deSelect(index);
	}
	removeSidebar();
}

function selectAllJSON(){
	count=document.getElementById("SelectedPhoto_count").value;
	var selectionJSON = "{";
	
	for(index=1; index<=count; index++){
		id=document.getElementById("SelectedPhoto_image_all"+index).value;
		select(index, id);
		selectionJSON = addJSONelement(selectionJSON, index, id);
	}
	var selectionJSON = selectionJSON + "}";
	return selectionJSON;
}

function checkSelectionJSON(id, acutalIndex){
	acutalIndex++;
	var selectionJSON = "{";
	count=document.getElementById("SelectedPhoto_count").value;
	
	if(document.getElementById("multi_selection").checked){
		var multi_selection=true;
	}
	
	for(index=1; index<=count; index++){
		if(acutalIndex==index){
			if(multi_selection){
				img=selection(id, index);
				selectionJSON = addJSONelement(selectionJSON, index, img);
			}else{
				select(index, id);
				selectionJSON = addJSONelement(selectionJSON, index, id);
			}
		}else{
			if(multi_selection){
				img=retrieveValue(index);
				selectionJSON = addJSONelement(selectionJSON, index, img);
			}else{
				deSelect(index);
				selectionJSON = addJSONelement(selectionJSON, index, "");
			}
		}
	}
	var selectionJSON = selectionJSON + "}";
	return selectionJSON;
}

function readCount(){
	return document.getElementById("SelectedPhoto_count").value;
}

function removeSidebar(){
	document.getElementById("right-panel-content").style.display='none';
	document.getElementById("hidden_edit_photo").style.display='';
}

function showSidebar(){
	document.getElementById("right-panel-content").style.display='';
	document.getElementById("hidden_edit_photo").style.display='none';
}

function checkShowSidebar(){
	count=document.getElementById("SelectedPhoto_count").value;
	for(i=1; i<=count; i++){
		if(document.getElementById("SelectedPhoto_selection_"+i).value!=""){
			return;
		}
	}
	removeSidebar();
}

function selectSlaveUser(url){	
	if($('#userSlave').attr('value')!=""){
		location.href=url+"/photo/submit/id/"+$('#userSlave').attr('value');
	}else{
		location.href=url+"/photo/submit";
	}
}