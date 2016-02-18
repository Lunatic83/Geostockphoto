function changeImg_mouseOut(){
	vote=document.getElementById("Reviews_rate").value;
	for(i=-5; i<=5; i++){
		if(vote<0){
			if(i>=vote && i<0)
				document.images['vote-stella'+i].src = yii.urls.base+"/images/star_red.png";
			else if(i!=0)
				document.images['vote-stella'+i].src = yii.urls.base+"/images/star_grey.png";
		}else if(vote>0){
			if(i<=vote && i>0)
				document.images['vote-stella'+i].src = yii.urls.base+"/images/star_yellow.png";
			else if(i!=0)
				document.images['vote-stella'+i].src = yii.urls.base+"/images/star_grey.png";
		}else if(i!=0)
			document.images['vote-stella'+i].src = yii.urls.base+"/images/star_grey.png";
	}
}

function changeImg_mouseOutIndex(){
	vote=document.getElementById("rate").value;
	for(i=0; i<=5; i++){
		if(vote>0){
			if(i<=vote && i>0)
				document.images['stella'+i].src = yii.urls.base+"/images/star_yellow.png";
			else if(i!=0)
				document.images['stella'+i].src = yii.urls.base+"/images/star_grey.png";
		}else if(i!=0)
			document.images['stella'+i].src = yii.urls.base+"/images/star_grey.png";
	}
}

function changeImg(cImg){
	for(i=-5; i<=-1; i++){
		if(i<cImg)
			document.images['vote-stella'+i].src = yii.urls.base+"/images/star_grey.png";
		else
			document.images['vote-stella'+i].src = yii.urls.base+"/images/star_red.png";
	}
			
	for(i=1; i<=5; i++){
		if(i<=cImg){
			document.images['vote-stella'+i].src = yii.urls.base+"/images/star_yellow.png";
		}else
			document.images['vote-stella'+i].src = yii.urls.base+"/images/star_grey.png";
	}
}

function changeImgIndex(cImg){	
	for(i=1; i<=5; i++){
		if(i<=cImg)
			document.images['stella'+i].src = yii.urls.base+"/images/star_yellow.png";
		else
			document.images['stella'+i].src = yii.urls.base+"/images/star_grey.png";
	}
}

function done(vote){
	document.getElementById("Reviews_rate").value=vote;
}

function doneIndex(vote){
	document.getElementById("rate").value=vote;
}

function doneHome(vote){
	document.getElementById("rate").value=vote;
	var text ="";
	if(vote<3)
		text="Start earning 50%";
	else if(vote==3)
		text="Start earning 60%";
	else if(vote==4)
		text="Start earning 70%";
	else if(vote==5)
		text="Start earning 80%";
	document.getElementById("button_rate").innerHTML=text;
}
