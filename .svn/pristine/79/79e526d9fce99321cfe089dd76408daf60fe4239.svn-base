/**
 * @author Marco
 */
//var id_checked_old = new Array();

function saveDuration(field, idProduct, url){
	var idDuration = field.options[field.selectedIndex].value;
	var url = url+"/idDuration/"+idDuration+"/idProduct/"+idProduct;
	//alert(url);
	window.location.href = url;
}

function selectOption(field){
	var field_elem = field.getElementsByTagName('*')[0];
	var id_elem = field_elem.id;
	var name_elem = field_elem.name;
	var field_hidden_elem = document.getElementById(id_elem);
	var field_tot_elem = document.getElementById("totPrice");
	var id_checked = field_elem.checked;
	if(id_checked_old[name_elem]==null){
		id_checked_old[name_elem]=new Array();
		document.getElementById('cntPhotos').value++;
		document.getElementById('cartSum_'+name_elem).style.display="";
	}
	if(id_checked_old[name_elem][id_elem]==null){
		id_checked_old[name_elem][id_elem]=false;
	}
	
	var new_value = parseFloat(field_hidden_elem.value);
	var old_totPrice = parseFloat(field_tot_elem.value);
	if(id_checked && !id_checked_old[name_elem][id_elem]){ // Non era stato precedentemente selezionato
		ajaxFunctionGenericNoReturn(yii.urls.saveShoppingOptCart+'/idProduct_row/'+id_elem);
		totValue = old_totPrice + new_value;
		//field_tot_elem.value = totValue;
		field_hidden_elem.checked = id_checked;
		id_checked_old[name_elem][id_elem]=id_checked;
		// Commentare la seguente funzione per la selezione multipla
		totValue=deselectAllChecked(id_elem, totValue, name_elem);
	}else if(!id_checked && id_checked_old[name_elem][id_elem]){ // Era già selezionato
		ajaxFunctionGenericNoReturn(yii.urls.saveShoppingOptCart+'/idProduct_row/'+id_elem+'/remove/true');
		totValue = old_totPrice - new_value;
		field_tot_elem.value = totValue;
		field_hidden_elem.checked = id_checked;
		//id_checked_old[name_elem][id_elem]=id_checked;
		document.getElementById('cntPhotos').value--;
		id_checked_old[name_elem]=null;
		document.getElementById('cartSum_'+name_elem).style.display="none";
	}
	if(document.getElementById('cartSum_size_'+name_elem).innerText!=null){
		document.getElementById('cartSum_size_'+name_elem).innerText=field.parentNode.cells[0].innerText;
		document.getElementById('cartSum_price_'+name_elem).innerText=new_value;
	}else{
		document.getElementById('cartSum_size_'+name_elem).innerHTML=field.parentNode.cells[0].innerHTML;
		document.getElementById('cartSum_price_'+name_elem).innerHTML=new_value;
	}
	checkNPhotos(totValue);
}

function checkNPhotos(totValue){
	var nPhotos = document.getElementById('cntPhotos').value;
	if(nPhotos==0){
		document.getElementById('buttonBuy').style.display="none";
		document.getElementById('buy_credits').style.display="none";
	}else{
		var myCredits = document.getElementById('myCredits').value;
		var divDiscount=document.getElementById('discount');
		if(divDiscount!==null){
			var discount = divDiscount.innerHTML;
			totValue=totValue*(1-discount/100);
		}
		diff=(totValue-myCredits).toFixed(2);
		if(diff<=0){
			document.getElementById('buttonBuy').style.display="";
			document.getElementById('buy_credits').style.display="none";
		}else{
			document.getElementById('buy_credits').style.display="";
			document.getElementById('creditsToBuy').innerText=diff;
			document.getElementById('euroToPay').innerText=diff;
			document.getElementById('shoppingCartAmount').value=diff;
			document.getElementById('buttonBuy').style.display="none";
		}
	}
}

function deselectAllChecked(id_elem, totValue, name_elem){
	if(id_checked_old[name_elem]!=null){
		var index;
		for(index in id_checked_old[name_elem]) {
			if(id_checked_old[name_elem][index]){
				var field_elem = document.getElementById(index);
				if(id_elem!=field_elem.id){
					totValue=totValue-field_elem.value;
					id_checked_old[name_elem][index]=false;
				}
			}
		}
		var field_tot_elem = document.getElementById("totPrice");
		field_tot_elem.value=totValue;
		return totValue;
	}
}

function ajaxFunctionGenericNoReturn(url){
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
	
	ajaxRequest.open("GET", url, true);
	ajaxRequest.send(null);
}