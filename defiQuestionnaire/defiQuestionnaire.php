<?php
require '../login/verif_connexion.php';
include '../media.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Défi Questionnaire</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-slider.css">
		<link rel="stylesheet" href="../css/myStyle.css">
		<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript"></script>	
		<script src="../js/bootstrap-slider.js" type="text/javascript"></script>
		<script src="../js/myLoadingMode.js" type="text/javascript"></script>
		<script src="../js/defiQuestionnaire.js" type="text/javascript"></script>
	</head>
	<body>
		<h1 id="t"></h1>
		<h1 id="part11" class="title1">Défi Questionnaire</h1>
		<h1 id="part21" class="title1"></h1>
		<h1 id="part31" class="title1">Défi Questionnaire</h1>
		<br>
		<br>
		<div id="block1" class="container">
		  <div class="jumbotron font1">
			<h3 id="part12" class="pharag4">Cliquer sur la bouton "Start" pour lancer le défi.</h3>
			<h3 id="part221" class="pharag4"></h3>
			<h3 id="part22" class="pharag4"></h3>
			<button id="contenu" type="button" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-1">Media</button>
		  </div>
		</div>
        
		<div id="block2" class="container">
			<div id="part24" class="jumbotron font1">
				<div class="row"> 
					<div class="well col-lg-4  col-lg-offset-1 font2">
						<h4 class="pharag1">Intervalle de réponse :</h4> 
						<b id="intValMin1"></b>
						<input id="sect1" type="text" value="" class="span2"/> 
						<b id="intValMax1"></b>    
						<h5 id="part25" class="pharag1"></h5>
					</div>
					<div class="well col-lg-4 col-lg-offset-2 font2">
						<h4 class="pharag1">Niveau de confiance :</h4>
						<input type="text" class="form-control" placeholder="100%" readonly>
					</div>
				</div>
				<div class="row">
					<div class="well col-lg-4  col-lg-offset-1 font2">
						<h4 class="pharag1">Intervalle de réponse </h4> 
						<b id="intValMin2"></b>
						<input id="sect2" type="text" value="" class="span2"/> 
						<b id="intValMax2"></b>   
						<h5 id="part26" class="pharag1"></h5>
					</div>
					<div class="well col-lg-4  col-lg-offset-2 font2">
						<h4 class="pharag1">Niveau de confiance :</h4>
						<input id="lambda2" type="text" value="" class="span2"/>
						<h5 id="textlam2" class="pharag1"></h5>
					</div>
				</div>
				<div class="row">
					<div class="well col-lg-4  col-lg-offset-1 font2">
						<h4 class="pharag1">Intervalle de réponse </h4> 
						<b id="intValMin3"></b>
						<input id="sect3" type="text" value="" class="span2"/> 
						<b id="intValMax3"></b>  
						<h5 id="part27" class="pharag1"></h5>
					</div>
					<div class="well col-lg-4  col-lg-offset-2 font2">
						<h4 class="pharag1">Niveau de confiance :</h4>
						<input id="lambda3" type="text" value="" class="span2"/>
						<h5 id="textlam3" class="pharag1"></h5>
					</div>
				</div>
			</div>	
		</div>
		
		<div id="block3" class="container">
			<table class="table table-bordered">
			  <caption class="pharag3">Résultat</caption>
			  <thead>
				<tr>
				  <th style="text-align:center">Question</th>
				  <th style="text-align:center">Score</th>
				</tr>
			  </thead>
			  <tbody>
				<tr class="info">
				  <td align="center">1</td>
				  <td id="score1" align="center"></td>
				</tr>
			  </tbody>
			  <tbody>
				<tr class="info">
				  <td align="center">2</td>
				  <td id="score2" align="center"></td>
				</tr>
			  </tbody>
			  	<tbody>
				<tr class="info">
				  <td align="center">3</td>
				  <td id="score3" align="center"></td>
				</tr>
			  </tbody>
			  	<tbody>
				<tr class="info">
				  <td align="center">4</td>
				  <td id="score4" align="center"></td>
				</tr>
			  </tbody>
			  	<tbody>
				<tr class="info">
				  <td align="center">5</td>
				  <td id="score5" align="center"></td>
				</tr>
			  </tbody>
			  	<tbody>
				<tr class="info">
				  <td align="center">Score moyen</td>
				  <td id="scoreM" align="center"></td>
				</tr>
			  </tbody>
			</table> 
		</div>
		
		<br>
		<button id="part14" type="button" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-5">Start</button>
		<button id="part23" type="button" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-9">Next</button>
		<button id="part28" type="button" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-9">Fin</button>
		<button id="part32" type="button" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-5">Return</button>
	</body>

</html>