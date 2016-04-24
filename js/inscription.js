$(document).ready(function(){
	var completed;
	$( "#mysubmit" ).click(function() {
	  completed = true;
	  $('.error').text('');
	  if ( isNull($( "#inputNom" ).val()) ){
	  		$( "#mes_err_nom" ).text("Veuillez entrer un nom");
	  		completed = false;
	  }else if ( !isLetter($( "#inputNom" ).val()) ){
	  		$( "#mes_err_nom" ).text("Nom invalid");
	  		completed = false;
	  }

	  if ( isNull($( "#inputPrenom" ).val()) ){
	  		$( "#mes_err_prenom" ).text("Veuillez entrer un prénom");
	  		completed = false;
	  }else if ( !isLetter($( "#inputPrenom" ).val()) ){
	  		$( "#mes_err_prenom" ).text("Prénom invalid");
	  		completed = false;
	  }

	  if ( isNull($( "#inputNickname" ).val()) ){
	  		$( "#mes_err_nickname" ).text("Veuillez entrer un surnom");
	  		completed = false;
	  }else if( !isNumberOrLetter($( "#inputNickname" ).val()) ){
	  		$( "#mes_err_nickname" ).text("Nickname invalid");
	  		completed = false;
	  }
	  $.ajax({
			type: 'POST',
			async: false,
			url: "../inscription/verifierNickname.php",
			data: {nickname: $( "#inputNickname" ).val()},
			success: function(result) {
				if( result != '' ){
					$( "#mes_err_nickname" ).text("Nickname déjà utilisé");
					completed = false;
				}
			},
			error: function () {
				$( "#mes_err_nickname" ).text("Erreur dans la BDD");
				completed = false;
			}
		});

	  if ( isNull($( "#inputEmail" ).val()) ){
	  		$( "#mes_err_mail" ).text("Veuillez entrer une adresse mel");
	  		completed = false;
	  }else if( !isEmail($( "#inputEmail" ).val()) ){
	  		$( "#mes_err_mail" ).text("Adresse mel invalide");
	  		completed = false;
	  }
	  $.ajax({
			type: 'POST',
			async: false,
			url: "../inscription/verifierLogin.php",
			data: {login: $( "#inputEmail" ).val()},
			success: function(result) {
				if( result != '' ){
					$( "#mes_err_mail" ).text("Adresse mel déjà inscrite");
					completed = false;
				}
			},
			error: function () {
				$( "#mes_err_mail" ).text("Erreur dans la BDD");
				completed = false;
			}
		});

	  if ( isNull($( "#inputPassword" ).val()) ){
	  		$( "#mes_err_password" ).text("Veuillez entrer un mot de passe");
	  		completed = false;
	  }
	  if ( isNull($( "#confirmPassword" ).val()) ){
	  		$( "#mes_err_confirmpassword" ).text("Veuillez confirmer votre mot de passe");
	  		completed = false;
	  }else if( $( "#confirmPassword" ).val() != $( "#inputPassword" ).val() ){
	  		$( "#mes_err_confirmpassword" ).text("Les mots de passe ne sont pas identiques");
	  		completed = false;
	  }
		  
	  //test if all important info completed
	  if ( completed == true ){
		  $('#inscriptionForm').submit();
	  }

	});
});

function isNull(str){ 
if ( str == "" || str == null ){ 
	return true;
}else{return false;}	
}

function isEmail(str){  
	var myReg = /([\w\-]+\@[\w\-]+\.[\w\-]+)/; 
	if(myReg.test(str)){
		return true; 
	}else{return false;}
}

function isNumberOrLetter(str){
	var regu = "^[0-9a-zA-Z]+$"; 
	var re = new RegExp(regu); 
	if (re.test(str)) { 
		return true; 
	}else{ 
			return false; 
		} 
}

function isLetter(str){
	var regu = "^[a-zA-Z]+$"; 
	var re = new RegExp(regu); 
	if (re.test(str)) { 
		return true; 
	}else{ 
			return false; 
	} 
}