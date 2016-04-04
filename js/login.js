
var existCompte = false;
var defi=0;
var ss = 2;

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

function checkInfos(str)
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
			document.getElementById("mes_login").innerHTML=resp;
			if(resp == "Echec: Login ou Password n'existe pas"){
				existCompte=false;
			}else{
				existCompte=true;
			}
		}
	}
	xmlhttp.open("POST","valider_login.php",false);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(postStr);
}


function turn_to_defi(){
	if(defi ==0){
		defi = 1;
	}else{
		defi = 0;
	}
}

function checkForm(){
	var login=document.forms["myForm"]["login"].value;
	var password=document.forms["myForm"]["password"].value;
	var infos=new Array();
	infos[0]=login; 
	infos[1]=password;
	infos[2]=defi;
    if(isNull(login)){
        document.getElementById("mes_err_login").innerHTML="Un login est obligatoire";
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
	}else{
		checkInfos(infos);
		if(existCompte==false){
			return false;
		}else{
			window.location.replace('../menuPrincipal.php');
			return false;
		}
        
    }
}


function checkAdmin(){
	var admin_login = "admin";
	var admin_MDP = "admin";
	var login=document.forms["myForm"]["login"].value;
	var password=document.forms["myForm"]["password"].value;
	if(login == admin_login && password == admin_MDP){
        window.location.replace('admin_menu.php');
    }else{
		document.getElementById("mes_login").innerHTML="Echec: login admin n'existe pas";
        
    }
}
