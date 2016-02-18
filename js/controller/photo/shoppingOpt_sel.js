/**
 * @author Marco
 */

function selectionType(){
	if(document.getElementById("ShoppingPhotoType_licenseType")!=null)
		var shoppingType=document.getElementById("ShoppingPhotoType_licenseType").value;
	else if(document.getElementById("User_preferredLicenseType")!=null)
		var shoppingType=document.getElementById("User_preferredLicenseType").value;
	
	if(shoppingType=="RF"){
		document.getElementById("shopping").style.display = "";
		document.getElementById("shoppingRF").style.display = "";
		document.getElementById("shoppingRM").style.display = "none";
	}else if(shoppingType=="RM"){
		document.getElementById("shopping").style.display = "";
		document.getElementById("shoppingRF").style.display = "none";
		document.getElementById("shoppingRM").style.display = "";
	}else{
		document.getElementById("shopping").style.display = "none";
	}
}

function selectionRmType(id, select){
	var idElem = id + "_" + select.value;
	var oldIdElem = id + "_" + select.oldvalue;
	if(document.getElementById(idElem))
		document.getElementById(idElem).style.display = "";
	if(document.getElementById(oldIdElem))
		document.getElementById(oldIdElem).style.display = "none";
}