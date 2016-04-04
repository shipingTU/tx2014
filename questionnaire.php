<?php require 'login/verif_connexion.php';?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Questionnaire</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/myStyle.css">
		<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/questionnaire.js" type="text/javascript"></script>	
	</head>
    <body>
        <h1 class="title2">Questionnaire</h1>
		<image src="images/questionnaire.png" class="col-lg-3" style="width:200px;height:150px">
		<br><br>
		
		<div class="alert-primary col-lg-5 col-lg-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4	class="pharag2">Niveau de difficulté :</h4>
				</div>
				<div class="panel-body">
					<form id="myForm" method="GET">
						<label class="radio-inline col-lg-3 col-lg-offset-1">
							<input type="radio" name="nivDif" value="facile"><b>Facile</b>
						</label>
						<label class="radio-inline col-lg-3 col-lg-offset-1">
							<input type="radio" name="nivDif" value="moyen"><b>Moyen</b>
						</label>
						<label class="radio-inline col-lg-3 col-lg-offset-1">
							<input type="radio" name="nivDif" value="difficile"><b>Difficile</b>
						</label>
					</form>
				</div>
			</div>
		</div>
		
		<br><br>
		
		<div class="centre btn-group-vertical col-lg-6 col-lg-offset-3">
			<dl class="dl-horizontal">
				<dt> <input id="boutonClas" type="submit" style="width:120px" class="btn btn-lg btn-danger" value="New"></dt>
				<dd> <h3 class="text-danger pharag1">Répondre à un nouveau questionnaire.</h3></dd>	
			</dl>
			<dl class="dl-horizontal">
				<dt> <input id="boutonHis" type="submit" style="width:120px" class="btn btn-lg btn-success" value="Saved"></dt>
				<dd> <h3 class="text-success pharag1">Répondre à un questionnaire enregistré. </h3></dd>
			</dl>
			<dl class="dl-horizontal">
				<dt> <input type="button" onclick="window.location.href='menuPrincipal.php'" style="width:120px" class="btn btn-lg btn-warning" value="Back"></dt>
				<dd> <h3 class="text-warning pharag1">Retourner au menu principal. </h3></dd>
			</dl>
		</div>
	</body>
</html>