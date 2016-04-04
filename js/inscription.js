var existDupli=false;
var ss = 8;

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

function isSamePW(str1, str2){
	if (str1 == str2) { 
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

function timer()  
            {  
                document.getElementById("timer").innerHTML = ss + " secondes";  
				ss = ss-1;  
            }  	

function stockInfos(str)
{
	var postStr=new Array();
	var postStr="q="+str;
	var resp="";
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
			resp=xmlhttp.responseText;
			document.getElementById("mes_reussie_inscrit").innerHTML=resp;
			if((resp == "Echec: Le nickname a déjà été utilisé")||(resp == "Echec: Le login a déjà été enregistré")){
				existDupli=true;
			}else{
				existDupli=false;
			}
		}
	}
	xmlhttp.open("POST","valider_inscription.php",false);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(postStr);
}

function checkForm(){
	var nom=document.forms["myForm"]["nom"].value;
	var prenom=document.forms["myForm"]["prenom"].value;
	var nickname=document.forms["myForm"]["nickname"].value;
	var login=document.forms["myForm"]["login"].value;
	var password=document.forms["myForm"]["password"].value;
	var confirmpassword=document.forms["myForm"]["confirmpassword"].value;
	var infos=new Array();
	infos[0]=nom; 
	infos[1]=prenom;
	infos[2]=nickname;
	infos[3]=login;
	infos[4]=password;
	
	if(isNull(nom)){
        document.getElementById("mes_err_nom").innerHTML="Veuillez entrer un nom";
        return false;
    }else if(!isLetter(nom)){
        document.getElementById("mes_err_nom").innerHTML="Nom invalide";
        return false;
    }else if(isNull(prenom)){
        document.getElementById("mes_err_prenom").innerHTML="Veuillez entrer un prénom";
        return false;
    }else if(!isLetter(prenom)){
        document.getElementById("mes_err_prenom").innerHTML="Prénom invalide";
        return false;
    }else if(isNull(nickname)){
        document.getElementById("mes_err_nickname").innerHTML="Veuillez entrer un nickname";
        return false;
    }else if(!isLetter(nickname)){
        document.getElementById("mes_err_nickname").innerHTML="Nickname invalide";
        return false;
	}else if(isNull(login)){
        document.getElementById("mes_err_login").innerHTML="Veuillez entrer un login";
        return false;
    }else if(!isEmail(login)){
        document.getElementById("mes_err_login").innerHTML="Adresse e-mail invalide";
        return false;
    }else if(isNull(password)){
		document.getElementById("mes_err_password").innerHTML="Un password est obligatoire";
        return false;
	}else if(!isNumberOrLetter(password)){
        document.getElementById("mes_err_password").innerHTML="Seulement les lettres et les chiffres sont acceptés";
        return false;
	}else if(isNull(confirmpassword)){
		document.getElementById("mes_err_confirmpassword").innerHTML="Il faut retaper le Password";
        return false;
	}else if(!isSamePW(password,confirmpassword)){
		document.getElementById("mes_err_confirmpassword").innerHTML="Les deux mots de passe ne sont pas identiques";
        return false;
	}else{
		stockInfos(infos);
		if(existDupli==true){
			return false;
		}else{
			window.location.replace('../login/login.php');
			return false;
		}
    }
}