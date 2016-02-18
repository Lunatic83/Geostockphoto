function askChallenge(username, url){
	//if($("#LoginForm_challenge").val()!=null){
	//verificare se  è il caso di reinviare la chiamata se è già stato popolato il challenge hidden	
	//}
			
}


function codifica_password(username, url){
	
	$.ajax({
		url: url+'/site/ajaxLoginChallenge/username/'+username,
		type: "GET",
		async: false,
	    success: function(response){			    	
	    	var resp_splitted=response.split("#");
			$("#LoginForm_challenge").val(resp_splitted[0]);
			$("#LoginForm_usernamereal").val(resp_splitted[1]);
			
			 var username = $("#LoginForm_usernamereal").val();
			 var sfida = $("#LoginForm_challenge").val();
			 var password_in_chiaro = $("#LoginForm_password").val();
			 var hash_pw_chiaro = hashPassword(password_in_chiaro,username).toString();
			 var hash = CryptoJS.SHA512(sfida+hash_pw_chiaro).toString();
			 
			 $("#LoginForm_hiddenpassword").val(hash);	 
			 
			 var pippo="";
				
			for (i=0; i<password_in_chiaro.length; i++){
				var num = Math.floor(Math.random() * (9));
				pippo=pippo + num.toString();	
			}
			
			 $("#LoginForm_password").val(pippo);
		}
	});
	
	
	 return true;
}


/**
 * @return hashed value
 */
function hashPassword(phrase, salt){    
    return CryptoJS.SHA512(phrase + salt);
}




