function tstEditconfirm(clicked){
	if(clicked=='delete'){
		smoke.confirm('Are you sure you want to<br>delete the photo(s)?',function(e){
			if (e){
				$('#photo-form-remove').attr('onsubmit','js:return true');
				$('#photo-form-remove').submit();
				return true;
			}else{
				return false;
			}
		});
	}else{
		$('#photo-form-remove').attr('onsubmit','js:return true');
		
	}
}


function tstBuyConfirm(clicked){
	if(clicked=='buy'){
		if(parseFloat($('#totPrice').attr('value'))>0){
			if(parseFloat($('#userCreditsAmount').attr('value'))>=parseFloat($('#totPrice').attr('value'))){
				smoke.confirm('Do you want to buy this cart?',function(e){
					if (e){
						$('#shopping-opt-form').attr('onsubmit','js:return true');
						$('#shopping-opt-form').submit();
						return true;
					}else{
						return false;
					}
				});
			}else{			
				smoke.confirm('You don\'t have enought credits!\nDo you want to recharge them?',function(e){
					if (e){
						$('#shoppingCartCreditsAmount').attr('value',$('#totPrice').attr('value'));
						$('#shopping-opt-form-paypal').submit();
						return true;
					}else{
						return false;
					}
				});
			}
			
		}else{
			smoke.alert('Please select a photo you want to buy');
		}
	}
}

function tstModifyEmailConfirm(clicked){
	if(clicked=='modify-mail'){
		smoke.confirm('If you change your email you have to re-activate your account! \nAre you sure?',function(e){
			if (e){
				document.getElementById('modify_email_block').style.display='';
				document.getElementById('User_email').disabled=false;	
				return true;
			}else{
				return false;
			}
		});
	}else{
		return true;
	}
}

function tstResetPasswordConfirm(clicked){
	if(clicked=='reset-password'){
		smoke.confirm('Change you password! Are you sure?',function(e){
			if (e){
				document.getElementById('reset_password_block').style.display='';
				return true;
			}else{
				return false;
			}
		});
	}else{
		return true;
	}
}

function tstDeletePhotoProfile(){	
	smoke.confirm('Delete Photo! Are you sure?',function(e){
		if (e){
			$("#delete-photo-form").submit();
		}else{
			return false;
		}
	});
}

function tstDeleteUser(redirect){	
	smoke.confirm('Do you want to delete your account? Are your sure? You will lost all your data!',function(e){
		if (e){
			window.location = redirect;
		}else{
			return false;
		}
	});
}

