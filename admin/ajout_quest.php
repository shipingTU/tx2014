<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Modification de la question</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootswatch.min.css">
<script>
var res=false;
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

function isChemin(str){  
	var myReg = /([\w\-]+\/[\w\-]+\.[\w\-]+)/; 
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

function isNaturalNumber(str){
	var regu = "^[0-9]+$"; 
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
			document.getElementById("mes_reussie_ajout").innerHTML=resp;
			if((resp == "L'ajout réussi")){
				res=true;
			}else{
				res=false;
			}
		}
	}
	xmlhttp.open("POST","valider_ajout_quest.php",false);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.send(postStr);
}


function checkForm(){
	var nivDif=document.forms["myForm"]["nivDif"].value;
	var type=document.forms["myForm"]["type"].value;
	var text=document.forms["myForm"]["text"].value;
	var contenu=document.forms["myForm"]["contenu"].value;
	var borneinf=document.forms["myForm"]["borneinf"].value;
	var bornesup=document.forms["myForm"]["bornesup"].value;
	var valexacte=document.forms["myForm"]["valexacte"].value;
	var modCharge=document.forms["myForm"]["modCharge"].value;
	var infos=new Array();
	infos[0]=nivDif; 
	infos[1]=type;
	infos[2]=borneinf;
	infos[3]=bornesup;
	infos[4]=text;
	infos[5]=valexacte;
	infos[6]=contenu;
	infos[7]=modCharge;
	
	if(isNull(text)){
        document.getElementById("mes_err_text").innerHTML="Veuillez remplir la description de la question";
        return false;
    }else if(isNull(contenu)){
        document.getElementById("mes_err_contenu").innerHTML="Veuillez entrer un chemin de la source";
        return false;
    }else if(!isChemin(contenu)){
        document.getElementById("mes_err_contenu").innerHTML="Chemin invalide";
        return false;
    }else if(isNull(borneinf)){
        document.getElementById("mes_err_bmin").innerHTML="Veuillez entrer une borne inférieure";
        return false;
    }else if(!isNaturalNumber(borneinf)){
        document.getElementById("mes_err_bmin").innerHTML="Une borne doit être positive";
        return false;
	}else if(isNull(bornesup)){
        document.getElementById("mes_err_bmax").innerHTML="Veuillez entrer une borne supérieure";
        return false;
    }else if(!isNaturalNumber(bornesup)){
        document.getElementById("mes_err_bmax").innerHTML="Une borne doit être positive";
        return false;
    }else if(isNull(valexacte)){
		document.getElementById("mes_err_valexacte").innerHTML="Veuillez entrer une réponse exacte";
        return false;
	}else if(!isNaturalNumber(valexacte)){
        document.getElementById("mes_err_valexacte").innerHTML="Une réponse doit être positive";
        return false;
	}else{
		stockInfos(infos);
		if(res==false){
			return false;
		}else{
			window.location.replace('administration_questions.php');
			return false;
		}
    }
}

</script>
<style>
		.center
		{
			position:relative;
			top:40px;
			margin:auto;
			width:50%;
		}
		.error {color: #FF0000;}
		.reussie {color: #228B22; 
				  font-style:italic;
				  font-weight: bold;
				 }
</style>
</head>
<body>   

<h1 style="color:FireBrick;text-align:center; position: relative; top:20px;">Ajouter une question</h1>   
		<div class="center">
            <div class="well bs-component">
              <form name="myForm" class="form-horizontal" onsubmit="return checkForm()" method="post">
				  <legend>Veuillez remplir les champs suivants</legend>
				  <div class="form-group">
					<span style="display:block;height:10px; line-height:20px;">
					<label for="inputNom" class="col-lg-2 control-label">Niveau difficulté</label>
					</span>
					<div class="col-lg-10">
					
					  <?php
					  echo "<input style='height:20px;' type='radio' name='nivDif' value='facile'><b>Facile</b><span style='margin-left:30px;'>";
					  echo "<input style='height:20px;' type='radio' name='nivDif' value='moyen'><b>Moyen</b><span style='margin-left:30px;'>";
					  echo "<input style='height:20px;' type='radio' name='nivDif' value='difficile'><b>difficile</b><span style='margin-left:30px;'>";
					  ?>
					  
					  <span id="mes_err_nom" class="error"></span>
					</div>
				  </div>
				  <div class="form-group">
					<span style="display:block;height:10px; line-height:20px;">
					<label for="inputNom" class="col-lg-2 control-label">Type</label>
					</span>
					<div class="col-lg-10">
					  <select name="type">
							<?php
							echo "<option style='height:20px;' value='image'>image</option>";
							echo "<option style='height:20px;' value='musique'>musique</option>";
							?>
					  </select>
					  
					  <span id="mes_err_nom" class="error"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPrenom" class="col-lg-2 control-label">Text</label>
					<div class="col-lg-10">
					  <input type="text" name="text" class="form-control" id="inputPrenom" placeholder="Description de la question">
					  
					  <span id="mes_err_text" class="error"></span>
					</div>
				  </div>
				   <div class="form-group">
					<label for="inputNickname" class="col-lg-2 control-label">Contenu</label>
					<div class="col-lg-10">
					  <input type="text" name="contenu" class="form-control" id="inputNickname" placeholder="Chemin du source d'image/de musique">
					  
					  <span id="mes_err_contenu" name="mes_nickname" class="error"></span>
					</div>
				  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Borne min</label>
                    <div class="col-lg-10">
                      <input type="text" name="borneinf" class="form-control" id="inputEmail" placeholder="Borne-">
					  
					  <span id="mes_err_bmin" class="error"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Borne max</label>
                    <div class="col-lg-10">
                      <input type="text" name="bornesup" class="form-control" id="inputPassword" placeholder="Borne+">
					  
					  <span id="mes_err_bmax" class="error"></span>
                    </div>
                  </div>
				  <div class="form-group">
					<span style="display:block;height:10px; line-height:20px;">
                    <label for="confirmPassword" class="col-lg-2 control-label">Réponse exacte</label>
					</span>
                    <div class="col-lg-10">
                      <input style='height:30px;' type="text" name="valexacte" class="form-control" id="confirmPassword" placeholder="valeur exact">
					  
					  <span id="mes_err_valexacte" class="error"></span>
                    </div>
                  </div>
				  <div class="form-group">
					<span style="display:block;height:10px; line-height:20px;">
					<label for="inputNom" class="col-lg-2 control-label">Mode chargement</label>
					</span>
					<div class="col-lg-10">
					
					  <?php
					  echo "<input style='height:20px;' type='radio' name='modCharge' value='avant'><b>Avant</b><span style='margin-left:30px;'>";
					  echo "<input style='height:20px;' type='radio' name='modCharge' value='apres'><b>Après</b><span style='margin-left:30px;'>";
					  echo "<input style='height:20px;' type='radio' name='modCharge' value='toujours'><b>Toujours</b><span style='margin-left:30px;'>";
					  ?>
					  
					  <span id="mes_err_nom" class="error"></span>
					</div>
				  </div>
                 
				 <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
					  <a href="administration_questions.php" class="btn btn-primary">Annuler</a>
                      <span style="margin-left:30px;"><input type="reset" value="Reset" class="btn btn-primary"></span>
					  <span style="margin-left:30px;"><input type="submit" value="OK" class="btn btn-primary"></span>
                    </div>
                  </div>
				  <span id="mes_reussie_ajout" class="reussie"></span><span style="margin-left:20px;" id="timer" class="reussie"></span>
              </form>
            </div>
		</div>
</body>
</html>